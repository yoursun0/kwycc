<?php

/* meta_gallery_categories.html.twig */
class __TwigTemplate_63b8c3912e38d27f9c4c73b3e759a6a6 extends Twig_Template
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
<div id=\"catdiv\" style=\"border-bottom:1px solid #dfdfdf;padding-bottom:10px;\">
    <p>
        ";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Override the default Image Set with this one, if a post belongs to one or more of the selected categories:"), "html", null, true);
        echo "
    </p>

    <div id=\"taxonomy-category\" class=\"categorydiv\">
        <ul id=\"category-tabs\" class=\"category-tabs\">
            ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["category_key"] => $context["category"]) {
            // line 18
            echo "            <li class=\"";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                echo "tabs";
            } else {
                echo "hide-if-no-js";
            }
            echo "\"><a href=\"#category-";
            echo twig_escape_filter($this->env, (isset($context["category_key"]) ? $context["category_key"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "label"), "html", null, true);
            echo "</a></li>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['category_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "        </ul>
        ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["category_key"] => $context["category"]) {
            // line 22
            echo "        <div id=\"category-";
            echo twig_escape_filter($this->env, (isset($context["category_key"]) ? $context["category_key"] : null), "html", null, true);
            echo "\" class=\"tabs-panel\" ";
            if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first"))) {
                echo "style=\"display: none;\"";
            }
            echo ">
            <ul id=\"categorychecklist-";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["category_key"]) ? $context["category_key"] : null), "html", null, true);
            echo "\" class=\"categorychecklist form-no-clear\">
                ";
            // line 24
            echo $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "checklist");
            echo "
            </ul>
        </div>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['category_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "    </div>
</div>

<div id=\"overlaycatdiv\" style=\"border-top:1px solid #fff;\">
    <p>
        ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Optionally override the overlay and color:"), "html", null, true);
        echo "
    </p>
    <div>
        ";
        // line 36
        echo $context["me"]->getfarbtastic_input("cat", (isset($context["background_color"]) ? $context["background_color"] : null));
        echo "
    </div>
    <p> 
        <select id=\"overlay_cat_override\" class=\"postform\" name=\"overlay_cat_override\">
            ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["overlays"]) ? $context["overlays"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["overlay"]) {
            // line 41
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
        // line 43
        echo "        </select>
    </p>
</div>

";
        // line 47
        echo $context["me"]->getfarbtastic_script("cat");
        echo "
";
    }

    public function getTemplateName()
    {
        return "meta_gallery_categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 47,  169 => 43,  154 => 41,  150 => 40,  143 => 36,  137 => 33,  130 => 28,  112 => 24,  108 => 23,  99 => 22,  82 => 21,  79 => 20,  29 => 12,  22 => 8,  80 => 35,  77 => 34,  67 => 31,  64 => 30,  62 => 29,  54 => 18,  50 => 23,  47 => 22,  34 => 16,  32 => 15,  26 => 12,  38 => 18,  28 => 11,  24 => 9,  37 => 17,  33 => 13,  27 => 10,  23 => 9,  19 => 7,);
    }
}
