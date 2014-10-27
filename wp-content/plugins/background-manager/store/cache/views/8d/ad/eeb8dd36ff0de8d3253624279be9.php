<?php

/* gallery_image.html.twig */
class __TwigTemplate_8dadeeb8dd36ff0de8d3253624279be9 extends Twig_Template
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
<div id=\"image_nav\" class=\"tablenav hide-if-js\">
    <div id=\"image_upload_html\">
        <form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
            ";
        // line 11
        echo (isset($context["nonce"]) ? $context["nonce"] : null);
        echo "
            <label class=\"screen-reader-text\" for=\"upload_file\">";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Add Image"), "html", null, true);
        echo "</label>
            <input type=\"file\" name=\"upload_file\" id=\"upload_file /\">
            <input type=\"submit\" name=\"upload\" id=\"upload\" class=\"button\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Add Image"), "html", null, true);
        echo "\" />
        </form>
    </div>
    <div id=\"image_nav_page_links\" class=\"tablenav-pages\">";
        // line 17
        echo (isset($context["page_links"]) ? $context["page_links"] : null);
        echo "</div>
</div>

<div id=\"image_container\">
    ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["images"]) ? $context["images"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 22
            echo "    <div id=\"image_";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "ID"), "html", null, true);
            echo "\" class=\"image myatu_inline_block\">
        <img src=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "thumb"), 0), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "meta_alt"), "html", null, true);
            echo "\" title=\"";
            if ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "post_excerpt")) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "post_excerpt"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "post_name"), "html", null, true);
            }
            echo "\" />
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "</div>

<div id=\"image_buttons\" class=\"image_buttons\">
    <a href=\"#\" id=\"image_edit_button\"   class=\"image_button myatu_inline_block\" title=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Edit Image"), "html", null, true);
        echo "\"   accesskey=\"e\"></a>
    <a href=\"#\" id=\"image_del_button\"    class=\"image_button myatu_inline_block\" title=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Delete Image"), "html", null, true);
        echo "\" accesskey=\"d\"></a>
    <a href=\"#\" id=\"image_remove_button\" class=\"image_button myatu_inline_block\" title=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Remove Image"), "html", null, true);
        echo "\" accesskey=\"r\"></a>
</div>

<div id=\"image_move_left_button_holder\" class=\"image_buttons\">
    <a href=\"#\" id=\"image_move_left_button\" class=\"image_button\" title=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Move Left"), "html", null, true);
        echo "\"  accesskey=\"n\"></a>
</div>

<div id=\"image_move_right_button_holder\" class=\"image_buttons\">
    <a href=\"\" id=\"image_move_right_button\" class=\"image_button\" title=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Move Right"), "html", null, true);
        echo "\" accesskey=\"m\"></a>
</div>

<script type=\"text/javascript\">
//<![CDATA[
jQuery(document).ready(function(\$){
    mainWin = window.dialogArguments || opener || parent || top;
    mainWin.myatu_bgm.onImagesIframeFinish(";
        // line 46
        echo twig_escape_filter($this->env, (isset($context["current_page"]) ? $context["current_page"] : null), "html", null, true);
        echo ");
});
//]]>
</script>
";
    }

    public function getTemplateName()
    {
        return "gallery_image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 46,  100 => 39,  93 => 35,  86 => 31,  82 => 30,  78 => 29,  73 => 26,  56 => 23,  51 => 22,  47 => 21,  40 => 17,  34 => 14,  29 => 12,  25 => 11,  19 => 7,);
    }
}
