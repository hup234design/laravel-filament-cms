<?php

namespace Hup234design\FilamentCms\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;
use RuntimeException;

class FilamentCmsSetup extends Command
{
    protected $signature = 'cms:install';

    public function handle()
    {
        $this->output->info('Install Filament CMS');

        $stubs = $this->getStubsPath();

        $this->call('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);

        $this->call('migrate');

        (new Filesystem())->copyDirectory($stubs.'/config', config_path(''));

        $this->runCommands([
            'npm install',
            'npm install alpinejs',
            'npm install tippy.js',
            'npm install -D tailwindcss postcss autoprefixer @tailwindcss/forms @tailwindcss/typography @tailwindcss/line-clamp @tailwindcss/aspect-ratio',
            'npx tailwindcss init -p'
        ]);

        copy($stubs.'/tailwind.config.js',   base_path('tailwind.config.js'));
        copy($stubs.'/postcss.config.js',   base_path('postcss.config.js'));
        copy($stubs.'/vite.config.js',   base_path('vite.config.js'));
        copy($stubs.'/resources/js/app.js',  resource_path('js/app.js'));
        copy($stubs.'/resources/css/app.css', resource_path('css/app.css'));

        (new Filesystem())->copyDirectory($stubs.'/resources', resource_path(''));
    }

    /**
     * Returns the path to the stubs.
     *
     * @return string
     */
    protected function getStubsPath()
    {
        return __DIR__.'/../../stubs';
    }

    /**
     * Run the given commands.
     *
     * @param  array  $commands
     * @return void
     */
    protected function runCommands($commands)
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                $this->output->writeln('  <bg=yellow;fg=black> WARN </> '.$e->getMessage().PHP_EOL);
            }
        }

        $process->run(function ($type, $line) {
            $this->output->write('    '.$line);
        });
    }
}
