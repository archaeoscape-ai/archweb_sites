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

/* columns_definitions/transformation.twig */
class __TwigTemplate_94a8ce9b82e6733a0d8484485aceb560eba80e576dffc1ebf01c147d802b1e7a extends \Twig\Template
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
    name=\"field_";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, (isset($context["column_number"]) ? $context["column_number"] : null), "html", null, true);
        echo "]\">
    <option value=\"\" title=\"";
        // line 4
        echo _gettext("None");
        echo "\"></option>
    ";
        // line 5
        if (($this->getAttribute((isset($context["available_mime"]) ? $context["available_mime"] : null), (isset($context["type"]) ? $context["type"] : null), [], "array", true, true) && twig_test_iterable($this->getAttribute((isset($context["available_mime"]) ? $context["available_mime"] : null), (isset($context["type"]) ? $context["type"] : null), [], "array")))) {
            // line 6
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["available_mime"]) ? $context["available_mime"] : null), (isset($context["type"]) ? $context["type"] : null), [], "array"));
            foreach ($context['_seq'] as $context["mimekey"] => $context["transform"]) {
                // line 7
                echo "            ";
                $context["checked"] = (((($this->getAttribute((isset($context["column_meta"]) ? $context["column_meta"] : null), "Field", [], "array", true, true) && $this->getAttribute($this->getAttribute(                // line 8
(isset($context["mime_map"]) ? $context["mime_map"] : null), $this->getAttribute((isset($context["column_meta"]) ? $context["column_meta"] : null), "Field", [], "array"), [], "array", false, true), (isset($context["type"]) ? $context["type"] : null), [], "array", true, true)) && preg_match((("@" . preg_quote($this->getAttribute($this->getAttribute(                // line 10
(isset($context["available_mime"]) ? $context["available_mime"] : null), ((isset($context["type"]) ? $context["type"] : null) . "_file"), [], "array"), $context["mimekey"], [], "array"), "@")) . "3?@i"), $this->getAttribute($this->getAttribute(                // line 9
(isset($context["mime_map"]) ? $context["mime_map"] : null), $this->getAttribute((isset($context["column_meta"]) ? $context["column_meta"] : null), "Field", [], "array"), [], "array"), (isset($context["type"]) ? $context["type"] : null), [], "array")))) ? ("selected ") : (""));
                // line 12
                echo "            ";
                $context["tooltip"] = PhpMyAdmin\Transformations::getDescription($this->getAttribute($this->getAttribute(                // line 13
(isset($context["available_mime"]) ? $context["available_mime"] : null), ((isset($context["type"]) ? $context["type"] : null) . "_file"), [], "array"), $context["mimekey"], [], "array"));
                // line 15
                echo "            ";
                $context["parts"] = twig_split_filter($this->env, $context["transform"], ":");
                // line 16
                echo "            ";
                $context["name"] = (((((PhpMyAdmin\Transformations::getName($this->getAttribute($this->getAttribute(                // line 17
(isset($context["available_mime"]) ? $context["available_mime"] : null), ((isset($context["type"]) ? $context["type"] : null) . "_file"), [], "array"), $context["mimekey"], [], "array")) . " (") . twig_lower_filter($this->env, $this->getAttribute(                // line 18
(isset($context["parts"]) ? $context["parts"] : null), 0, [], "array"))) . ":") . $this->getAttribute((isset($context["parts"]) ? $context["parts"] : null), 1, [], "array")) . ")");
                // line 19
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["available_mime"]) ? $context["available_mime"] : null), ((isset($context["type"]) ? $context["type"] : null) . "_file"), [], "array"), $context["mimekey"], [], "array"), "html", null, true);
                echo "\"
                ";
                // line 20
                echo twig_escape_filter($this->env, (isset($context["checked"]) ? $context["checked"] : null), "html", null, true);
                echo "
                title=\"";
                // line 21
                echo twig_escape_filter($this->env, (isset($context["tooltip"]) ? $context["tooltip"] : null), "html", null, true);
                echo "\">
                ";
                // line 22
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                echo "
            </option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['mimekey'], $context['transform'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "    ";
        }
        // line 26
        echo "</select>
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/transformation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 26,  95 => 25,  86 => 22,  82 => 21,  78 => 20,  73 => 19,  71 => 18,  70 => 17,  68 => 16,  65 => 15,  63 => 13,  61 => 12,  59 => 9,  58 => 10,  57 => 8,  55 => 7,  50 => 6,  48 => 5,  44 => 4,  38 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "columns_definitions/transformation.twig", "/var/www/html/pma/templates/columns_definitions/transformation.twig");
    }
}
