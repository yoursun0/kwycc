<?php

/* meta_gallery_tags.html.twig */
class __TwigTemplate_01afb92768d7e04a83b9d51aef2f2998 extends Twig_Template
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
        $context["me"] = $this->env->loadTemplate("macros_edit.html.twig");
        // line 9
        echo "
<div id=\"tagsdiv-post_tag\" style=\"border-bottom:1px solid #dfdfdf;padding-bottom:10px;\">
    <p>
        ";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Override the default Image Set with this one, if a post contains one or more of the selected tags:"), "html", null, true);
        echo "
    </p>

    <div class=\"tagsdiv\" id=\"post_tag\">
        <div class=\"nojs-tags hide-if-js\">
            <p>
                Add or remove tags
            </p>
            <textarea name=\"tax_input[post_tag]\" rows=\"3\" cols=\"20\" class=\"the-tags\" id=\"tax-input-post_tag\" >";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["tags"]) ? $context["tags"] : null), "html", null, true);
        echo "</textarea>
        </div>
        <div class=\"ajaxtag hide-if-no-js\">
            <p>
                <input type=\"text\" id=\"new-tag-post_tag\" name=\"newtag[post_tag]\" class=\"newtag form-input-tip\" size=\"16\" autocomplete=\"off\" value=\"\" />
                <input type=\"button\" class=\"button tagadd\" value=\"Add\" />
            </p>
        </div>

        <p class=\"howto\">Separate tags with commas</p>

        <div class=\"tagchecklist\"></div>
    </div>
</div>

<div id=\"overlaytagdiv\" style=\"border-top:1px solid #fff;\">
    <p>
        ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Optionally override the overlay and color:"), "html", null, true);
        echo "
    </p>
    <div>
        ";
        // line 40
        echo $context["me"]->getfarbtastic_input("tag", (isset($context["background_color"]) ? $context["background_color"] : null));
        echo "
    </div>
    <p>
        <select id=\"overlay_tag_override\" class=\"postform\" name=\"overlay_tag_override\">
            ";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["overlays"]) ? $context["overlays"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["overlay"]) {
            // line 45
            echo "            <option ";
            if ($this->getAttribute((isset($context["overlay"]) ? $context["overlay"] : null), "selected")) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["overlay"]) ? $context["overlay"] : null), "value"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["overlay"]) ? $context["overlay"] : null), "desc"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['overlay'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "        </select>
    </p>
</div>

";
        // line 51
        echo $context["me"]->getfarbtastic_script("tag");
        echo "
";
    }

    public function getTemplateName()
    {
        return "meta_gallery_tags.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 51,  92 => 47,  73 => 44,  66 => 40,  60 => 37,  40 => 20,  175 => 47,  169 => 43,  154 => 41,  150 => 40,  143 => 36,  137 => 33,  130 => 28,  112 => 24,  108 => 23,  99 => 22,  82 => 21,  79 => 20,  29 => 12,  22 => 8,  80 => 35,  77 => 45,  67 => 31,  64 => 30,  62 => 29,  54 => 18,  50 => 23,  47 => 22,  34 => 16,  32 => 15,  26 => 12,  38 => 18,  28 => 11,  24 => 9,  37 => 17,  33 => 13,  27 => 10,  23 => 9,  19 => 7,);
    }
}
