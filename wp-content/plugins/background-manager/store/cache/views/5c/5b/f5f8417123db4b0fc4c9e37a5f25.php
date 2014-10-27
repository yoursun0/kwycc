<?php

/* edit_gallery.html.twig */
class __TwigTemplate_5c5bf5f8417123db4b0fc4c9e37a5f25 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
<form name=\"gallery\" method=\"post\" action=\"\">
    <input type=\"hidden\" id=\"edit_id\" name=\"edit\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["edit"]) ? $context["edit"] : null), "html", null, true);
        echo "\" />
    <input type=\"hidden\" id=\"images_hash\" name=\"images_hash\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["images_hash"]) ? $context["images_hash"] : null), "html", null, true);
        echo "\" />
    <input type=\"hidden\" id=\"images_iframe_base\" name=\"images_iframe_base\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["images_iframe_src"]) ? $context["images_iframe_src"] : null), "html", null, true);
        echo "\" />
    <input type=\"hidden\" id=\"images_per_page\" name=\"images_per_page\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["images_per_page"]) ? $context["images_per_page"] : null), "html", null, true);
        echo "\" />
    <input type=\"hidden\" id=\"image_iframe_edit_base\" name=\"image_iframe_edit_base\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["image_edit_src"]) ? $context["image_edit_src"] : null), "html", null, true);
        echo "\" />
    <input type=\"hidden\" id=\"image_del_is_perm\" name=\"image_del_is_perm\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["image_del_is_perm"]) ? $context["image_del_is_perm"] : null), "html", null, true);
        echo "\" />
    ";
        // line 15
        echo (isset($context["nonce"]) ? $context["nonce"] : null);
        echo "
    ";
        // line 16
        echo (isset($context["nonce_meta_order"]) ? $context["nonce_meta_order"] : null);
        echo "
    ";
        // line 17
        echo (isset($context["nonce_meta_clsd"]) ? $context["nonce_meta_clsd"] : null);
        echo "

    <div id=\"poststuff\" ";
        // line 19
        if ((!(isset($context["is_wp34"]) ? $context["is_wp34"] : null))) {
            echo "class=\"metabox-holder ";
            echo twig_escape_filter($this->env, (isset($context["has_right_sidebar"]) ? $context["has_right_sidebar"] : null), "html", null, true);
            echo "\"";
        }
        echo ">
        ";
        // line 20
        if ((!(isset($context["is_wp34"]) ? $context["is_wp34"] : null))) {
            // line 21
            echo "        <div id=\"side-info-column\" class=\"inner-sidebar\">
            ";
            // line 22
            echo (isset($context["meta_boxes_side"]) ? $context["meta_boxes_side"] : null);
            echo "
        </div>
        ";
        }
        // line 25
        echo "
        <div id=\"post-body\" ";
        // line 26
        if ((isset($context["is_wp34"]) ? $context["is_wp34"] : null)) {
            echo "class=\"metabox-holder ";
            echo twig_escape_filter($this->env, (isset($context["has_right_sidebar"]) ? $context["has_right_sidebar"] : null), "html", null, true);
            echo "\"";
        }
        echo ">
            <div id=\"post-body-content\">
                <div id=\"titlediv\">
                    <div id=\"titlewrap\">
                        <input id=\"title\" type=\"text\" autocomplete=\"off\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "post_title"), "html", null, true);
        echo "\" tabindex=\"1\" size=\"30\" name=\"post_title\" placeholder=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Enter title here"), "html", null, true);
        echo "\" />
                    </div>
                </div>

                <div id=\"imagediv\" class=\"postarea\">
                    <div id=\"editor-toolbar\" class=\"hide-if-no-js\">
                        <div id=\"imagediv_nav\" class=\"tablenav\">
                             <div class=\"tablenav-pages\"></div>
                        </div>
                        <div id=\"media-buttons\" class=\"wp-media-buttons\">
                            ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["media_buttons"]) ? $context["media_buttons"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
            // line 41
            echo "                            <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "url"), "html", null, true);
            echo "\" id=\"add_";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "id"), "html", null, true);
            echo "\" class=\"thickbox button insert-media add_media\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "title"), "html", null, true);
            echo "\">
                                <span class=\"wp-media-buttons-icon\"></span> ";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "title"), "html", null, true);
            echo "
                            </a>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                            <span id=\"small-loader\"></span>
                        </div>
                    </div>

                    <div id=\"image_editor_container\" class=\"wp-editor-container\">
                        <div id=\"quicktags\" class=\"quicktags-toolbar\">
                            <div id=\"ed_toolbar\" class=\"img_ed_buttons\">
                                ";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Image Selection: "), "html", null, true);
        echo "
                                <a id=\"ed_move_l_selected\" href=\"#\" class=\"button\" accesskey=\"[\" title=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Move the selected images to the left"), "html", null, true);
        echo "\"><i></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Move Left"), "html", null, true);
        echo "</a>
                                <a id=\"ed_move_r_selected\" href=\"#\" class=\"button\" accesskey=\"]\" title=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Move the selected images to the right"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Move Right"), "html", null, true);
        echo " <i></i></a>
                                &nbsp;
                                <a id=\"ed_delete_selected\" href=\"#\" class=\"button\" accesskey=\"l\" title=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Permanently delete the selected images"), "html", null, true);
        echo "\"><i></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Delete"), "html", null, true);
        echo "</a>
                                <a id=\"ed_remove_selected\" href=\"#\" class=\"button\" accesskey=\"v\" title=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Remove (detach) the images from the Image Set"), "html", null, true);
        echo "\"><i></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Remove"), "html", null, true);
        echo "</a>
                                &nbsp;
                                <a id=\"ed_clear_selected\" href=\"#\" class=\"button\" accesskey=\"c\" title=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Clear the selection"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Clear"), "html", null, true);
        echo "</a>
                            </div>
                        </div>
                        <div id=\"editorcontainer\">
                            <iframe id=\"images_iframe\" src=\"";
        // line 63
        echo twig_escape_filter($this->env, (isset($context["images_iframe_src"]) ? $context["images_iframe_src"] : null), "html", null, true);
        echo "\" tabindex=\"2\"></iframe>
                        </div>
                    </div>
                    <table id=\"post-status-info\">
                        <tbody>
                            <tr>
                                <td id=\"wp-word-count\">
                                    ";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Image count"), "html", null, true);
        echo ": <span id=\"image-count\">";
        echo twig_escape_filter($this->env, (isset($context["images_count"]) ? $context["images_count"] : null), "html", null, true);
        echo "</span>
                                    <span id=\"selected-count\">(<span id=\"select-count\">0</span> ";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("selected"), "html", null, true);
        echo ")</span>
                                </td>
                                <td>
                                    <i id=\"resize_window\"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                ";
        // line 81
        if ((!(isset($context["is_wp34"]) ? $context["is_wp34"] : null))) {
            // line 82
            echo "                ";
            echo (isset($context["meta_boxes_main"]) ? $context["meta_boxes_main"] : null);
            echo "
                ";
        }
        // line 84
        echo "            </div> ";
        // line 85
        echo "
            ";
        // line 86
        if ((isset($context["is_wp34"]) ? $context["is_wp34"] : null)) {
            // line 87
            echo "            <div id=\"postbox-container-1\" class=\"postbox-container\">";
            echo (isset($context["meta_boxes_side"]) ? $context["meta_boxes_side"] : null);
            echo "</div>
            <div id=\"postbox-container-2\" class=\"postbox-container\">";
            // line 88
            echo (isset($context["meta_boxes_main"]) ? $context["meta_boxes_main"] : null);
            echo "</div>
            ";
        }
        // line 90
        echo "        </div> ";
        // line 91
        echo "        <br class=\"clear\" />
    </div> ";
        // line 93
        echo "</form>

<script type=\"text/javascript\">
//<![CDATA[
try{document.gallery.title.focus();}catch(e){}
//]]>
</script>
";
    }

    public function getTemplateName()
    {
        return "edit_gallery.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 93,  234 => 91,  232 => 90,  227 => 88,  222 => 87,  220 => 86,  217 => 85,  215 => 84,  209 => 82,  207 => 81,  194 => 71,  188 => 70,  178 => 63,  162 => 57,  156 => 56,  149 => 54,  139 => 52,  121 => 42,  93 => 30,  70 => 21,  68 => 20,  55 => 17,  51 => 16,  43 => 14,  39 => 13,  35 => 12,  31 => 11,  98 => 51,  92 => 47,  73 => 22,  66 => 40,  60 => 19,  40 => 20,  175 => 47,  169 => 59,  154 => 41,  150 => 40,  143 => 53,  137 => 33,  130 => 45,  112 => 41,  108 => 40,  99 => 22,  82 => 26,  79 => 25,  29 => 12,  22 => 8,  80 => 35,  77 => 45,  67 => 31,  64 => 30,  62 => 29,  54 => 18,  50 => 23,  47 => 15,  34 => 16,  32 => 15,  26 => 12,  38 => 18,  28 => 11,  24 => 9,  37 => 17,  33 => 13,  27 => 10,  23 => 9,  19 => 7,);
    }
}
