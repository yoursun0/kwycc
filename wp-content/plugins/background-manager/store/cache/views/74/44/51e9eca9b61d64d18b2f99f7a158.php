<?php

/* media_library_bgm_url.html.twig */
class __TwigTemplate_744451e9eca9b61d64d18b2f99f7a158 extends Twig_Template
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
        if ((isset($context["errors"]) ? $context["errors"] : null)) {
            // line 8
            echo "<div id=\"message\" class=\"error\">";
            echo twig_escape_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null), "html", null, true);
            echo "</div>
";
        }
        // line 10
        echo "
<form method=\"post\" action=\"\" class=\"media-upload-form type-form\">
    <input type=\"hidden\" name=\"post_id\" id=\"post_id\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["post_id"]) ? $context["post_id"] : null), "html", null, true);
        echo "\" />
    ";
        // line 13
        echo (isset($context["nonce"]) ? $context["nonce"] : null);
        echo "

    ";
        // line 15
        if (((isset($context["attachment"]) ? $context["attachment"] : null) != "")) {
            // line 16
            echo "    <input type=\"hidden\" name=\"attachment_id\" id=\"attachment_id\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["attachment_id"]) ? $context["attachment_id"] : null), "html", null, true);
            echo "\" />

    <div id=\"media-items\">
        <div class=\"media-item\">
            ";
            // line 20
            echo (isset($context["attachment"]) ? $context["attachment"] : null);
            echo "
        </div>
    </div>

    ";
            // line 24
            echo (isset($context["save_btn"]) ? $context["save_btn"] : null);
            echo "
    ";
        } else {
            // line 26
            echo "
    <h3 class=\"media-title\">";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Add an image from an external source"), "html", null, true);
            echo "</h3>
    <p>";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("After an image has been retrieved, you can add a title and description."), "html", null, true);
            echo "</p>

    <label for=\"url\">Image URL:</label>
    <input id=\"url\" name=\"url\" type=\"text\" value=\"http://\" style=\"width:300px;\" />
    
    ";
            // line 33
            echo (isset($context["get_btn"]) ? $context["get_btn"] : null);
            echo "
    ";
        }
        // line 35
        echo "</form>

";
    }

    public function getTemplateName()
    {
        return "media_library_bgm_url.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 35,  77 => 33,  69 => 28,  65 => 27,  62 => 26,  57 => 24,  50 => 20,  42 => 16,  40 => 15,  35 => 13,  31 => 12,  27 => 10,  21 => 8,  19 => 7,);
    }
}
