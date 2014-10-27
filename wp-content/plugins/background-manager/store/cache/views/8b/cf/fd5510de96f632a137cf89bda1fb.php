<?php

/* meta_gallery_submit.html.twig */
class __TwigTemplate_8bcffd5510de96f632a137cf89bda1fb extends Twig_Template
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
<div class=\"submitbox\" id=\"submitpost\">
    <div id=\"minor-publishing\">
        <div style=\"display:none;\">
            <p class=\"submit\">
                <input id=\"save\" class=\"button\" type=\"submit\" name=\"submit\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["save_btn_title"]) ? $context["save_btn_title"] : null), "html", null, true);
        echo "\" />
            </p>
        </div>
        ";
        // line 15
        if ((isset($context["gallery_id"]) ? $context["gallery_id"] : null)) {
            // line 16
            echo "        <div style=\"padding:0 10px\">
            <p>
                ";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Gallery Shortcode:"), "html", null, true);
            echo " <code>[gallery id=&quot;";
            echo twig_escape_filter($this->env, (isset($context["gallery_id"]) ? $context["gallery_id"] : null), "html", null, true);
            echo "&quot;]</code>
            </p>
        </div>
        ";
        }
        // line 22
        echo "        <div class=\"misc-pub-section-last\" style=\"padding: 0 10px 10px\">
            <p><label for=\"post_content\">";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Short Description"), "html", null, true);
        echo ":</label></p>
            <textarea id=\"post_content\" name=\"post_content\" class=\"large-text\" rows=\"3\" cols=\"30\" style=\"width:100%;\" tabindex=\"4\">";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "post_content"), "html", null, true);
        echo "</textarea>
            <div class=\"clear\"></div>
        </div>
    </div>
    <div id=\"major-publishing-actions\">
        ";
        // line 29
        if ((isset($context["show_delete_action"]) ? $context["show_delete_action"] : null)) {
            // line 30
            echo "        <div id=\"delete-action\">
            <a href=\"";
            // line 31
            echo $this->getAttribute((isset($context["delete_action"]) ? $context["delete_action"] : null), "url");
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["delete_action"]) ? $context["delete_action"] : null), "title"), "html", null, true);
            echo "\" class=\"submitdelete deletion\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["delete_action"]) ? $context["delete_action"] : null), "text"), "html", null, true);
            echo "</a>
        </div>
        ";
        }
        // line 34
        echo "        <div id=\"publishing-action\">
            <input name=\"submit\" type=\"submit\" class=\"button-primary\" id=\"publish\" tabindex=\"5\" accesskey=\"p\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["save_btn_title"]) ? $context["save_btn_title"] : null), "html", null, true);
        echo "\" />
        </div>
        <div class=\"clear\"></div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "meta_gallery_submit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 35,  77 => 34,  67 => 31,  64 => 30,  62 => 29,  54 => 24,  50 => 23,  47 => 22,  34 => 16,  32 => 15,  26 => 12,  38 => 18,  28 => 11,  24 => 10,  37 => 14,  33 => 13,  27 => 10,  23 => 9,  19 => 7,);
    }
}
