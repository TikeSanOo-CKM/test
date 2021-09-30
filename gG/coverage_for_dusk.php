<?php
/**
 * This is a tool for help coverage generation on Dusk
 * This was based on this article: http://tarunlalwani.com/post/php-code-coverage-web-selenium/
 *1. add this file to your laravel tests directory
 *2. add the following line to your nginx config:
 * fastcgi_param PHP_VALUE "auto_prepend_file=\"/absolute_path/tests/coverage_for_dusk.php\"";
 * if you are using apache you can use this line on .htaccess:
 * php_value auto_prepend_file "/absolute_path/tests/coverage_for_dusk.php"
 *3. Sample test:
 *     public function testBasicExample()
 *     {
 *         $this->browse(function (Browser $browser) {
 *             $browser->visit(route('teste', [
 *                 'test_name' => 'testBasicExample',
 *                 'coverage_dir' => '/app/Http'
 *             ]))->assertSee('teste');
 *         });
 *     }
 * The tests will be generated into public/reports in a subfolder called $_GET['test_name']
 * You can chose the whitelist folder/files in $_GET['coverage_dir']
 */
if (isset($_GET['test_name']) && $_GET['test_name']) {
    $test_name = $_GET['test_name'];

    require __DIR__ . '/../vendor/autoload.php';
    $current_dir = __DIR__;
    $coverage = new SebastianBergmann\CodeCoverage\CodeCoverage;
    $filter = $coverage->filter();
    $filter->addDirectoryToWhitelist(
        $current_dir . '/..' . ((isset($_GET['coverage_dir']) && $_GET['coverage_dir'])
            ? $_GET['coverage_dir']
            : '/app')
    );

    $coverage->start($test_name);

    function end_coverage()
    {
        global $test_name;
        global $coverage;
        global $filter;
        global $current_dir;
        $coverageName = $current_dir . '/coverages/coverage-' . $test_name . '-' . microtime(true);

        try {
            $coverage->stop();
            $writer = new \SebastianBergmann\CodeCoverage\Report\Html\Facade;
            $writer->process($coverage, $current_dir . '/../public/report/' . $test_name);
            $writer = new SebastianBergmann\CodeCoverage\Report\PHP();
        } catch (Exception $ex) {
            file_put_contents($coverageName . '.ex', $ex);
        }
    }

    class coverage_dumper
    {
        public function __destruct()
        {
            end_coverage();
        }
    }

    $_coverage_dumper = new coverage_dumper();
}
