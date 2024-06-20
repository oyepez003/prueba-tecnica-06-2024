<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @WebProfiler/Profiler/search.html.twig */
class __TwigTemplate_31ea303a9841d7d532be9cf6fe86e431 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/search.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/search.html.twig"));

        // line 1
        yield "<div id=\"sidebar-search\">
    <form action=\"";
        // line 2
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler_search");
        yield "\" method=\"get\">
        <div class=\"form-group\">
            <label for=\"ip\">
                ";
        // line 5
        if (("command" == (isset($context["profile_type"]) || array_key_exists("profile_type", $context) ? $context["profile_type"] : (function () { throw new RuntimeError('Variable "profile_type" does not exist.', 5, $this->source); })()))) {
            // line 6
            yield "                    Application
                ";
        } else {
            // line 8
            yield "                    IP
                ";
        }
        // line 10
        yield "            </label>
            <input type=\"text\" name=\"ip\" id=\"ip\" value=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["ip"]) || array_key_exists("ip", $context) ? $context["ip"] : (function () { throw new RuntimeError('Variable "ip" does not exist.', 11, $this->source); })()), "html", null, true);
        yield "\">
        </div>

        <div class=\"form-group-row\">
            <div class=\"form-group\">
                <label for=\"method\">
                    ";
        // line 17
        if (("command" == (isset($context["profile_type"]) || array_key_exists("profile_type", $context) ? $context["profile_type"] : (function () { throw new RuntimeError('Variable "profile_type" does not exist.', 17, $this->source); })()))) {
            // line 18
            yield "                        Mode
                    ";
        } else {
            // line 20
            yield "                        Method
                    ";
        }
        // line 22
        yield "                </label>
                <select name=\"method\" id=\"method\">
                    <option value=\"\">Any</option>
                    ";
        // line 25
        if (("command" == (isset($context["profile_type"]) || array_key_exists("profile_type", $context) ? $context["profile_type"] : (function () { throw new RuntimeError('Variable "profile_type" does not exist.', 25, $this->source); })()))) {
            // line 26
            yield "                        ";
            $context["methods"] = ["BATCH", "INTERACTIVE"];
            // line 27
            yield "                    ";
        } else {
            // line 28
            yield "                        ";
            $context["methods"] = ["DELETE", "GET", "HEAD", "PATCH", "POST", "PUT"];
            // line 29
            yield "                    ";
        }
        // line 30
        yield "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["methods"]) || array_key_exists("methods", $context) ? $context["methods"] : (function () { throw new RuntimeError('Variable "methods" does not exist.', 30, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 31
            yield "                        <option ";
            yield ((($context["m"] == (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 31, $this->source); })()))) ? ("selected=\"selected\"") : (""));
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["m"], "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "                </select>
            </div>

            <div class=\"form-group\">
                <label for=\"status_code\">
                    ";
        // line 38
        if (("command" == (isset($context["profile_type"]) || array_key_exists("profile_type", $context) ? $context["profile_type"] : (function () { throw new RuntimeError('Variable "profile_type" does not exist.', 38, $this->source); })()))) {
            // line 39
            yield "                        Exit code
                        ";
            // line 40
            $context["min_and_max"] = Twig\Extension\CoreExtension::sprintf("min=%d max=%d", 0, 255);
            // line 41
            yield "                    ";
        } else {
            // line 42
            yield "                        Status
                        ";
            // line 43
            $context["min_and_max"] = Twig\Extension\CoreExtension::sprintf("min=%d max=%d", 100, 599);
            // line 44
            yield "                    ";
        }
        // line 45
        yield "                </label>
                <input type=\"number\" name=\"status_code\" id=\"status_code\" ";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["min_and_max"]) || array_key_exists("min_and_max", $context) ? $context["min_and_max"] : (function () { throw new RuntimeError('Variable "min_and_max" does not exist.', 46, $this->source); })()), "html", null, true);
        yield " value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status_code"]) || array_key_exists("status_code", $context) ? $context["status_code"] : (function () { throw new RuntimeError('Variable "status_code" does not exist.', 46, $this->source); })()), "html", null, true);
        yield "\">
            </div>
        </div>

        <div class=\"form-group\">
            <label for=\"url\">
                ";
        // line 52
        if (("command" == (isset($context["profile_type"]) || array_key_exists("profile_type", $context) ? $context["profile_type"] : (function () { throw new RuntimeError('Variable "profile_type" does not exist.', 52, $this->source); })()))) {
            // line 53
            yield "                    Command
                ";
        } else {
            // line 55
            yield "                    URL
                ";
        }
        // line 57
        yield "            </label>
            <input type=\"text\" name=\"url\" id=\"url\" value=\"";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 58, $this->source); })()), "html", null, true);
        yield "\">
        </div>

        <div class=\"form-group\">
            <label for=\"token\">Token</label>
            <input type=\"text\" name=\"token\" id=\"token\" size=\"8\" value=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["token"]) || array_key_exists("token", $context) ? $context["token"] : (function () { throw new RuntimeError('Variable "token" does not exist.', 63, $this->source); })()), "html", null, true);
        yield "\">
        </div>

        <div class=\"form-group\">
            <label for=\"start\">From</label>
            <input type=\"date\" name=\"start\" id=\"start\" value=\"";
        // line 68
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["start"]) || array_key_exists("start", $context) ? $context["start"] : (function () { throw new RuntimeError('Variable "start" does not exist.', 68, $this->source); })()), "html", null, true);
        yield "\">
        </div>

        <div class=\"form-group\">
            <label for=\"end\">Until</label>
            <input type=\"date\" name=\"end\" id=\"end\" value=\"";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["end"]) || array_key_exists("end", $context) ? $context["end"] : (function () { throw new RuntimeError('Variable "end" does not exist.', 73, $this->source); })()), "html", null, true);
        yield "\">
        </div>

        <div class=\"form-group-row form-group-row-search-button\">
            <div class=\"form-group\">
                <label for=\"limit\">Results</label>
                <select name=\"limit\" id=\"limit\">
                    ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable([10, 50, 100]);
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 81
            yield "                        <option ";
            yield ((($context["l"] == (isset($context["limit"]) || array_key_exists("limit", $context) ? $context["limit"] : (function () { throw new RuntimeError('Variable "limit" does not exist.', 81, $this->source); })()))) ? ("selected=\"selected\"") : (""));
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["l"], "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        yield "                </select>
            </div>

            <input type=\"hidden\" name=\"type\" value=\"";
        // line 86
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["profile_type"]) || array_key_exists("profile_type", $context) ? $context["profile_type"] : (function () { throw new RuntimeError('Variable "profile_type" does not exist.', 86, $this->source); })()), "html", null, true);
        yield "\">

            <div class=\"form-group\">
                <button type=\"submit\" class=\"btn btn-sm\">Search</button>
            </div>
        </div>
    </form>
</div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/search.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  226 => 86,  221 => 83,  210 => 81,  206 => 80,  196 => 73,  188 => 68,  180 => 63,  172 => 58,  169 => 57,  165 => 55,  161 => 53,  159 => 52,  148 => 46,  145 => 45,  142 => 44,  140 => 43,  137 => 42,  134 => 41,  132 => 40,  129 => 39,  127 => 38,  120 => 33,  109 => 31,  104 => 30,  101 => 29,  98 => 28,  95 => 27,  92 => 26,  90 => 25,  85 => 22,  81 => 20,  77 => 18,  75 => 17,  66 => 11,  63 => 10,  59 => 8,  55 => 6,  53 => 5,  47 => 2,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"sidebar-search\">
    <form action=\"{{ path('_profiler_search') }}\" method=\"get\">
        <div class=\"form-group\">
            <label for=\"ip\">
                {% if 'command' == profile_type %}
                    Application
                {% else %}
                    IP
                {% endif %}
            </label>
            <input type=\"text\" name=\"ip\" id=\"ip\" value=\"{{ ip }}\">
        </div>

        <div class=\"form-group-row\">
            <div class=\"form-group\">
                <label for=\"method\">
                    {% if 'command' == profile_type %}
                        Mode
                    {% else %}
                        Method
                    {% endif %}
                </label>
                <select name=\"method\" id=\"method\">
                    <option value=\"\">Any</option>
                    {% if 'command' == profile_type %}
                        {% set methods = ['BATCH', 'INTERACTIVE'] %}
                    {% else %}
                        {% set methods = ['DELETE', 'GET', 'HEAD', 'PATCH', 'POST', 'PUT'] %}
                    {% endif %}
                    {% for m in methods %}
                        <option {{ m == method ? 'selected=\"selected\"' }}>{{ m }}</option>
                    {% endfor %}
                </select>
            </div>

            <div class=\"form-group\">
                <label for=\"status_code\">
                    {% if 'command' == profile_type %}
                        Exit code
                        {% set min_and_max = 'min=%d max=%d'|format(0, 255) %}
                    {% else %}
                        Status
                        {% set min_and_max = 'min=%d max=%d'|format(100, 599) %}
                    {% endif %}
                </label>
                <input type=\"number\" name=\"status_code\" id=\"status_code\" {{ min_and_max }} value=\"{{ status_code }}\">
            </div>
        </div>

        <div class=\"form-group\">
            <label for=\"url\">
                {% if 'command' == profile_type %}
                    Command
                {% else %}
                    URL
                {% endif %}
            </label>
            <input type=\"text\" name=\"url\" id=\"url\" value=\"{{ url }}\">
        </div>

        <div class=\"form-group\">
            <label for=\"token\">Token</label>
            <input type=\"text\" name=\"token\" id=\"token\" size=\"8\" value=\"{{ token }}\">
        </div>

        <div class=\"form-group\">
            <label for=\"start\">From</label>
            <input type=\"date\" name=\"start\" id=\"start\" value=\"{{ start }}\">
        </div>

        <div class=\"form-group\">
            <label for=\"end\">Until</label>
            <input type=\"date\" name=\"end\" id=\"end\" value=\"{{ end }}\">
        </div>

        <div class=\"form-group-row form-group-row-search-button\">
            <div class=\"form-group\">
                <label for=\"limit\">Results</label>
                <select name=\"limit\" id=\"limit\">
                    {% for l in [10, 50, 100] %}
                        <option {{ l == limit ? 'selected=\"selected\"' }}>{{ l }}</option>
                    {% endfor %}
                </select>
            </div>

            <input type=\"hidden\" name=\"type\" value=\"{{ profile_type }}\">

            <div class=\"form-group\">
                <button type=\"submit\" class=\"btn btn-sm\">Search</button>
            </div>
        </div>
    </form>
</div>
", "@WebProfiler/Profiler/search.html.twig", "/app/my_project_directory/vendor/symfony/web-profiler-bundle/Resources/views/Profiler/search.html.twig");
    }
}
