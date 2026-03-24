<?php

namespace GIS\EditablePriceBlock;

use GIS\EditableBlocks\Traits\ExpandBlocksTrait;
use GIS\EditablePriceBlock\Helpers\PriceBlockRenderActionsManager;
use GIS\EditablePriceBlock\Livewire\Admin\Types\PricesWire;
use GIS\EditablePriceBlock\Models\PriceRecord;
use GIS\EditablePriceBlock\Observers\PriceRecordObserver;
use GIS\Fileable\Traits\ExpandTemplatesTrait;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class EditablePriceBlockServiceProvider extends ServiceProvider
{
    use ExpandTemplatesTrait, ExpandBlocksTrait;

    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . "/database/migrations");
        $this->mergeConfigFrom(__DIR__ . "/config/editable-price-block.php", "editable-price-block");
        $this->initFacades();
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . "/resources/views", "eprb");
        $this->addLivewireComponents();
        $this->expandConfiguration();
        $this->observeModels();
    }

    protected function initFacades(): void
    {
        $this->app->singleton("price-block-render-actions", function () {
            $managerClass = config("editable-price-block.customBlockRecordActionsManager") ?? PriceBlockRenderActionsManager::class;
            return new $managerClass();
        });
    }

    protected function addLivewireComponents(): void
    {
        $component = config("editable-price-block.customPriceComponent");
        Livewire::component(
            "eprb-prices",
            $component ?? PricesWire::class,
        );
    }

    protected function expandConfiguration(): void
    {
        $eprb = app()->config["editable-price-block"];
        $this->expandTemplates($eprb);
        $this->expandBlocks($eprb);
        $this->expandBlockRender($eprb);
    }

    protected function observeModels(): void
    {
        $modelClass = config("editable-price-block.customPriceRecordModel") ?? PriceRecord::class;
        $observerClass = config("editable-price-block.customPriceRecordModelObserver") ?? PriceRecordObserver::class;
        $modelClass::observe($observerClass);
    }
}
