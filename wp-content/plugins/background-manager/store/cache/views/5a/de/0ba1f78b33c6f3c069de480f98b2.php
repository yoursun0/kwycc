<?php

/* import.html.twig */
class __TwigTemplate_5ade0ba1f78b33c6f3c069de480f98b2 extends Twig_Template
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
";
        // line 8
        if ((!(isset($context["run_import"]) ? $context["run_import"] : null))) {
            // line 9
            echo "<form method=\"post\" action=\"\">
    ";
            // line 10
            echo (isset($context["nonce"]) ? $context["nonce"] : null);
            echo "
    ";
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["importers"]) ? $context["importers"] : null));
            foreach ($context['_seq'] as $context["importer_key"] => $context["importer_value"]) {
                // line 12
                echo "    <input type=\"hidden\" id=\"";
                echo twig_escape_filter($this->env, (isset($context["importer_key"]) ? $context["importer_key"] : null), "html", null, true);
                echo "_desc\" name=\"";
                echo twig_escape_filter($this->env, (isset($context["importer_key"]) ? $context["importer_key"] : null), "html", null, true);
                echo "_desc\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["importer_value"]) ? $context["importer_value"] : null), "desc"), "html", null, true);
                echo "\" />
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['importer_key'], $context['importer_value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "    
    <table class=\"form-table\">
        <tbody>
            <tr valign=\"top\">
                <th scope=\"row\">
                    <label for=\"importer\">";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Import using"), "html", null, true);
            echo "</label>
                </th>
                <td>
                    <select id=\"importer\" class=\"postform\" name=\"importer";
            // line 22
            if ((isset($context["show_pre_import"]) ? $context["show_pre_import"] : null)) {
                echo "_disabled";
            }
            echo "\" ";
            if ((isset($context["show_pre_import"]) ? $context["show_pre_import"] : null)) {
                echo "disabled=\"disabled\"";
            }
            echo ">
                        <option value=\"\">-- ";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Select an importer"), "html", null, true);
            echo " --</option>
                        ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["importers"]) ? $context["importers"] : null));
            foreach ($context['_seq'] as $context["importer_key"] => $context["importer_value"]) {
                // line 25
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["importer_key"]) ? $context["importer_key"] : null), "html", null, true);
                echo "\" ";
                if ((!$this->getAttribute((isset($context["importer_value"]) ? $context["importer_value"] : null), "active"))) {
                    echo "disabled=\"disabled\"";
                }
                echo " ";
                if (((isset($context["importer"]) ? $context["importer"] : null) == (isset($context["importer_key"]) ? $context["importer_key"] : null))) {
                    echo "selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["importer_value"]) ? $context["importer_value"] : null), "name"), "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['importer_key'], $context['importer_value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "                    </select>
                    <br />
                    <span id=\"importer_desc\" class=\"description\"></span>
                </td>
            </tr>
        </tbody>
    </table>

    ";
            // line 35
            if ((isset($context["show_pre_import"]) ? $context["show_pre_import"] : null)) {
                // line 36
                echo "    <input type=\"hidden\" name=\"importer\" value=\"";
                echo twig_escape_filter($this->env, (isset($context["importer"]) ? $context["importer"] : null), "html", null, true);
                echo "\" />
    
    ";
                // line 38
                echo (isset($context["pre_import"]) ? $context["pre_import"] : null);
                echo "
    ";
            }
            // line 40
            echo "
    ";
            // line 41
            echo (isset($context["submit_button"]) ? $context["submit_button"] : null);
            echo "
</form>
";
        } else {
            // line 44
            echo "<table class=\"form-table\">
    <tbody>
        <tr valign=\"top\">
            <th scope=\"row\">
                ";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Import progress:"), "html", null, true);
            echo "
            </th>
            <td>
                <div id=\"import_progress_bar_container\" style=\"display:none;\">
                    <div id=\"import_progress_bar\"></div>
                </div>
                <span id=\"import_progress\" class=\"hide-if-no-js\">0%</span>

                <iframe id=\"import_job\" src=\"";
            // line 56
            echo twig_escape_filter($this->env, (isset($context["import_job_src"]) ? $context["import_job_src"] : null), "html", null, true);
            echo "\" class=\"hide-if-js\"></iframe>
            </td>
        </tr>
    </tbody>
</table>
";
        }
        // line 62
        echo "



";
    }

    public function getTemplateName()
    {
        return "import.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 62,  147 => 56,  136 => 48,  130 => 44,  124 => 41,  121 => 40,  116 => 38,  110 => 36,  108 => 35,  98 => 27,  79 => 25,  75 => 24,  71 => 23,  61 => 22,  55 => 19,  48 => 14,  35 => 12,  31 => 11,  27 => 10,  24 => 9,  22 => 8,  19 => 7,);
    }
}
