<?php

/* importer_local.html.twig */
class __TwigTemplate_defc1e03752cf50cbe1bf8b60439ed72 extends Twig_Template
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
<table class=\"form-table\">
    <tbody>
        <tr>
            <th>
                ";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Directory"), "html", null, true);
        echo "
            </th>
            <td>
                <div class=\"hide-if-js\">
                    <span>";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["root"]) ? $context["root"] : null), "html", null, true);
        echo "</span>
                    <input type=\"text\" id=\"directory\" name=\"directory\" value=\"\" style=\"width:300px;\" />
                </div>
                <span class=\"hide-if-no-js\">";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Select a directory to import"), "html", null, true);
        echo ":</span>
                <div id=\"directory_listing\" style=\"height:250px;overflow:auto;border:1px solid #aaa;display:none;\">
                    ";
        // line 21
        echo (isset($context["directory"]) ? $context["directory"] : null);
        echo "
                </div>
            </td>
        </tr>
        <tr>
            <th>
                ";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Sub-directories"), "html", null, true);
        echo "
            </th>
            <td>
                <label>
                    <input type=\"checkbox\" value=\"1\" id=\"sub_dirs\" name=\"sub_dirs\" checked=\"checked\" />
                    <span>";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Include sub-directoies"), "html", null, true);
        echo "</span>
                </label>
            </td>
        </tr>
    </tbody>
</table>

<script type=\"text/javascript\">
//<![CDATA[
(function(\$){
    \$(document).ready(function(\$){
        \$('#directory_listing').bind('loaded.jstree', function() {
            \$(this).fadeIn('slow');
        }).bind('select_node.jstree', function(e, o) {
            var selected_node = \$('#directory_listing').jstree('get_selected'), dir = \$('a', selected_node).attr('data-dir');

            \$('#directory').val(dir);
        }).jstree({
            ";
        // line 50
        if ((isset($context["rtl"]) ? $context["rtl"] : null)) {
            // line 51
            echo "            'themes' : {
                'theme' : 'default-rtl'
            },
            ";
        }
        // line 55
        echo "            'plugins': ['themes', 'html_data','ui'],
            'core' : {
                'initially_open' : ['root']
            },
            'ui' : {
                'select_limit' : 1
            }
        });
    });
})(jQuery);
//]]>
</script>
";
    }

    public function getTemplateName()
    {
        return "importer_local.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 55,  84 => 51,  82 => 50,  61 => 32,  53 => 27,  44 => 21,  39 => 19,  33 => 16,  26 => 12,  19 => 7,);
    }
}
