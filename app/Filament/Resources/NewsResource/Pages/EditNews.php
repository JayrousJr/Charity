<?php

namespace App\Filament\Resources\NewsResource\Pages;

use Filament\Actions;
use App\Filament\Resources\NewsResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditNews extends EditRecord
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('News')
            ->icon('heroicon-o-pencil-square')
            ->iconColor('success')
            ->body('Te News & Event has been edited')
            ->send();
    }
}
