<?php

namespace YOS\FilamentExcel\Actions;

use Closure;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Support\Facades\FilamentIcon;
use Maatwebsite\Excel\Facades\Excel;
use YOS\FilamentExcel\Concerns;

class Import extends Actions\Action
{
    use Concerns\HasImport;
    use Concerns\HasType;
    use Concerns\HasHint;

    protected ?Closure $getRelationshipUsing = null;
    protected bool | Closure $canCreateAnother = true;

    public static function getDefaultName(): ?string
    {
        return 'import';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(fn (): string => __('filament-actions::create.single.label', ['label' => $this->getModelLabel()]));

        $this->modalHeading(fn (): string => __('filament-actions::create.single.modal.heading', ['label' => $this->getModelLabel()]));

        $this->modalSubmitActionLabel(__('filament-actions::create.single.modal.actions.create.label'));

        $this->extraModalFooterActions(function (): array {
            return $this->canCreateAnother() ? [
                $this->makeModalSubmitAction('createAnother', arguments: ['another' => true])
                    ->label(__('filament-actions::create.single.modal.actions.create_another.label')),
            ] : [];
        });

        $this->successNotificationTitle(__('filament-actions::create.single.notifications.created.title'));

        $this->groupedIcon(FilamentIcon::resolve('actions::create-action.grouped') ?? 'heroicon-m-plus');

        $this->form([
            FileUpload::make('file')
                ->hint(fn() => $this->getHint())
                ->storeFiles(false)
        ]);

        $this->action(function (array $arguments, $form, $data): void {
            Excel::import(new ($this->getImport()), $data['file'], null, $this->getType());
            $this->success();
        });
    }

    public function relationship(?Closure $relationship): static
    {
        $this->getRelationshipUsing = $relationship;

        return $this;
    }
    public function canCreateAnother(): bool
    {
        return (bool) $this->evaluate($this->canCreateAnother);
    }
}
