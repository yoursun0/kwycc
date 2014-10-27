<?php
/**
* @package   Widgetkit
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

/*
	Class: WidgetWidgetkitHelper
		Widget helper class. Create and manage Widgets.
*/
class WidgetWidgetkitHelper extends WidgetkitHelper {

	/* post type */
	const POST_TYPE = 'WIDGETKIT';

	/* database */
	public $db;

	/*
		Function: Constructor
			Class Constructor.
	*/
	public function __construct($widgetkit) {
		parent::__construct($widgetkit);

		// init vars
		$this->db = $GLOBALS['wpdb'];
	}

	/*
		Function: get
			Retrieve a widget instance by id.

		Returns:
			Array
	*/
	public function get($id) {

		// get post
		$post = $this->db->get_row('SELECT * FROM '.$this->db->posts.' WHERE post_type="'.self::POST_TYPE.'" AND ID='.$id, ARRAY_A);

		return is_array($post) ? new WidgetkitWidget($id, $post['post_mime_type'], $post['post_excerpt'], $post['post_title'], $post['post_content'], $post['post_date'], $post['post_modified']) : null;
	}

	/*
		Function: all
			Retrieve all widget instances.

		Returns:
			Array
	*/
	public function all($type = null) {

		// init vars
		$widgets = array();
		$query   = 'SELECT * FROM '.$this->db->posts.' WHERE post_type="'.self::POST_TYPE.'"'.($type ? ' AND post_mime_type="'.$type.'"' : null).' ORDER BY post_title ASC';

		foreach ((array) $this->db->get_results($query) as $post) {
			$widgets[] = new WidgetkitWidget($post->ID, $post->post_mime_type, $post->post_excerpt, $post->post_title, $post->post_content, $post->post_date, $post->post_modified);
		}

		return $widgets;
	}

	/*
		Function: save
			Save a widget instance, returns widget instance id.

		Parameters:
			$data - Widget data

		Returns:
			Int
	*/
	public function save($data) {

		// convert numeric strings to real integers
		if (isset($data['settings']) && is_array($data['settings'])) {
			$data['settings'] = array_map(create_function('$item', 'return is_numeric($item) ? (float) $item : $item;'),$data['settings']);
		}

		// init vars
		$time = time();
		$post = array(
			'post_title'        => esc_sql($data['name']),
			'post_mime_type'    => esc_sql($data['type']),
			'post_excerpt'      => esc_sql($data['style']),
			'post_content'      => esc_sql(json_encode($data)),
			'post_modified'     => date('Y-m-d H:i:s', $time),
			'post_modified_gmt' => gmdate('Y-m-d H:i:s', $time)
		);

		//Multisite fix
		remove_filter('content_save_pre', 'wp_filter_post_kses' );

		// is update ?
		if (isset($data['id']) && $data['id']) {
			return wp_update_post(array_merge($post, array('ID' => $data['id'])));
		}

		// do insert
		return wp_insert_post(array_merge($post, array(
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'post_date'      => $post['post_modified'],
			'post_date_gmt'  => $post['post_modified_gmt'],
			'post_type'      => self::POST_TYPE
		)));
	}

	/*
		Function: delete
			Delete a widget instance.

		Parameters:
			$id - Widget id

		Returns:
			Void
	*/
	public function delete($id) {
		return $this->db->query('DELETE FROM '.$this->db->posts.' WHERE post_type="'.self::POST_TYPE.'" AND ID='.(int) $id);
	}

	/*
		Function: copy
			Copy a widget instance.

		Parameters:
			$id - Widget id

		Returns:
			Void
	*/
	public function copy($id) {

		// get widget
		$widget = $this->get($id);

		// set data
		$data = json_decode((string) $widget->content, true);
		$data['id'] = null;
		$data['name'] .= ' (Copy)';

		return $this->save($data);
	}

	/*
		Function: render
			Render a widget instance.

		Parameters:
			$id - Widget id

		Returns:
			String
	*/
	public function render($id) {

		if ($widget = $this->get((int) $id)) {
			return $this->renderWidgetObject($widget);
		}

		return false;
	}

	/*
		Function: renderWidgetObject
			Render a widget object.

		Parameters:
			$widget- Widget object

		Returns:
			String
	*/
	public function renderWidgetObject($widget) {

		if (is_object($widget) && isset($widget->type)) {

			if (!$this->widgetkit->getHelper($widget->type)) {
				return "Widget {$widget->type} not found!";
			}

			// on render event
			$this['event']->trigger('render', array($widget));

			$output = $this[$widget->type]->render($widget);

			$this['event']->trigger('widgetoutput', array(&$output));

			return $output;
		}

		return false;
	}

	/*
		Function: styles
			Get style list of a widget.

		Parameters:
			$type - Widget type

		Returns:
			Array
	*/
	public function styles($type) {

		$styles = array();
		$type   = strtolower($type);

		if ($path = $this["path"]->path("widgets:{$type}/styles")) {

			foreach (new DirectoryIterator($path) as $file) {
			    if($file->isDir() && !$file->isDot() && file_exists($file->getPathname().'/config.xml')) {
			    	$styles[] = $file->getBasename();
			    }
			}
		}

		return $styles;
	}

	/*
		Function: defaultStyle
			Get default style of a widget.

		Parameters:
			$type - Widget type

		Returns:
			Mixed
	*/
	public function defaultStyle($type) {
		$styles = $this->styles($type);

		return isset($styles[0]) ? $styles[0] : null;
	}

}

/*
	Class: WidgetkitWidget
		The Widget class.
*/
class WidgetkitWidget {

	/* identifier */
	public $id;

	/* type */
	public $type;

	/* style */
	public $style;

	/* name */
	public $name;

	/* content */
	public $content;

	/* created at */
	public $created;

	/* modified at */
	public $modified;

	/*
		Function: Constructor
			Class Constructor.
	*/
	public function __construct($id, $type, $style, $name, $content, $created, $modified) {

		$widgetkit = Widgetkit::getInstance();

		// init vars
		$this->id       = $id;
		$this->type     = $type;
		$this->name     = $name;
		$this->content  = $widgetkit['data']->create($content);
		$this->created  = $created;
		$this->modified = $modified;

		if(is_null($style)){
			$settings = $this->content->get("settings", array());
			$style    = isset($settings["style"]) ? $settings["style"] : null;
		}

		if (is_null($style) || !$widgetkit["path"]->path("widgets:".$this->type."/styles/{$style}/config.xml")) {
			$style  = $widgetkit["widget"]->defaultStyle($this->type);
		}

		$this->style = $style;
	}

	/*
		Function: __isset
			Has a key ? (via magic method)

		Parameters:
			$name - String

		Returns:
			Boolean
	*/
	public function __isset($name) {
		return $this->content->has($name);
	}

	/*
		Function: __get
			Get a value (via magic method)

		Parameters:
			$name - String

		Returns:
			Mixed
	*/
	public function __get($name) {
		return $this->content->get($name);
	}

 	/*
		Function: __set
			Set a value (via magic method)

		Parameters:
			$name - String
			$value - Mixed

		Returns:
			Void
	*/
	public function __set($name, $value) {
		$this->content->set($name, $value);
	}

 	/*
		Function: __unset
			Unset a value (via magic method)

		Parameters:
			$name - String

		Returns:
			Void
	*/
	public function __unset($name) {
		$this->content->remove($name);
	}

}
