<?php

namespace Waygou\Xheetah\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xheetah:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs Xheetah Admin in a brand new project.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('');
        $this->info('');
        $this->info('*** Xheetah - Courier Backend framework - First installation ***');
        $this->info('');

        if (! File::exists(app_path('Providers/NovaServiceProvider.php'))) {
            $this->info('');

            return $this->error('Error -- Looks like Laravel Nova is not installed on your system. Please try again.');
        }

        $this->info('Publishing Surveyor Provider (--force) ...');
        $this->commandExecute('php artisan vendor:publish --provider=Waygou\Surveyor\SurveyorServiceProvider --force');

        $this->info('Publishing Nova Surveyor Provider ...');
        $this->commandExecute('php artisan vendor:publish --provider=Waygou\SurveyorNova\ToolServiceProvider');

        $this->info('Publishing Nova Xheetah Provider ...');
        $this->commandExecute('php artisan vendor:publish --provider=Waygou\XheetahNova\ToolServiceProvider --force');

        $this->info('Publishing Xheetah Utilities Provider ...');
        $this->commandExecute('php artisan vendor:publish --provider=Waygou\XheetahUtils\XheetahUtilsServiceProvider --force');

        $this->info('Running initial Surveyor / Xheetah utilities migrations ...');
        $this->commandExecute('php artisan migrate --force');

        $this->info('Publishing Xheetah Provider resources and overrides (--force) ...');
        $this->commandExecute('php artisan vendor:publish --provider=Waygou\Xheetah\XheetahServiceProvider --force');

        $this->info('Publishing Nova Xheetah theme Provider resources and overrides (--force) ...');
        $this->commandExecute('php artisan vendor:publish --provider=Waygou\XheetahNovaTheme\ThemeServiceProvider --force');

        $this->info('Running composer dumpautoload ...');
        $this->commandExecute('composer dumpautoload');

        $this->info('Running first Xheetah schema migrations ...');
        $this->commandExecute('php artisan migrate');

        $this->info('Running initial Xheetah seed ...');
        $this->commandExecute('php artisan db:seed --class=XheetahSchemaSeeder');

        $this->info('Running testing data Xheetah seed ...');
        $this->commandExecute('php artisan db:seed --class=XheetahTestingDataSeeder');

        $this->info('Deleting App/Nova/User.php resource class ...');
        File::delete(app_path('Nova/User.php'));

        $this->info('Deleting App/User.php model class ...');
        File::delete(app_path('User.php'));

        $this->info('All done!');
    }

    protected function commandExecute($command)
    {
        $process = new Process($command);
        $process->run();

        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $this->error($process->getOutput());
    }
}
