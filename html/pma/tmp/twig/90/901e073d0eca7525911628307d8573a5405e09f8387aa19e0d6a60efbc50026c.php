<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* columns_definitions/mime_type.twig */
class __TwigTemplate_71819104744af5db66cbaf43e206f7e27bdded105c87bf09a1bdfae4941fe003 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<select id=\"field_";
        echo twig_escape_filter($this->env, (isset($context["column_number"]) ? $context["column_number"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ci"]) ? $context["ci"] : null) - (isset($context["ci_offset"]) ? $context["ci_offset"] : null)), "html", null, true);
        echo "\"
    size=\"1\"
    name=\"field_mimetype[";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["column_number"]) ? $context["column_number"] : null), "html", null, true);
        echo "]\">
    <option value=\"\">&nbsp;</option>
    ";
        // line 5
        if (($this->getAttribute((isset($context["available_mime"]) ? $context["available_mime"] : null), "mimetype", [], "array", true, true) && twig_test_iterable($this->getAttribute(        // line 6
(isset($context["available_mime"]) ? $context["available_mime"] : null), "mimetype", [], "array")))) {
            // line 7
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["available_mime"]) ? $context["available_mime"] : null), "mimetype", [], "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["mimetype"]) {
                // line 8
                echo "            ";
                $context["checked"] = (((($this->getAttribute((isset($context["column_meta"]) ? $context["column_meta"] : null), "Field", [], "array", true, true) && $this->getAttribute($this->getAttribute(                // line 9
(isset($context["mime_map"]) ? $context["mime_map"] : null), $this->getAttribute((isset($context["column_meta"]) ? $context["column_meta"] : null), "Field", [], "array"), [], "array", false, true), "mimetype", [], "array", true, true)) && ($this->getAttribute($this->getAttribute(                // line 10
(isset($context["mime_map"]) ? $context["mime_map"] : null), $this->getAttribute((isset($context["column_meta"]) ? $context["column_meta"] : null), "Field", [], "array"), [], "array"), "mimetype", [], "array") == twig_replace_filter($context["mimetype"], ["/" => "_"])))) ? (" selected") : (""));
                // line 12
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, twig_replace_filter($context["mimetype"], ["/" => "_"]), "html", null, true);
                echo "\"";
                echo twig_escape_filter($this->env, (isset($context["checked"]) ? $context["checked"] : null), "html", null, true);
                echo ">
                ";
                // line 13
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $context["mimetype"]), "html", null, true);
                echo "
            </option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mimetype'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "    ";
        }
        // line 17
        echo "</select>
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/mime_type.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 17,  72 => 16,  63 => 13,  56 => 12,  54 => 10,  53 => 9,  51 => 8,  46 => 7,  44 => 6,  43 => 5,  38 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "columns_definitions/mime_type.twig", "/var/www/html/pma/templates/columns_definitions/mime_type.twig");
    }
}
