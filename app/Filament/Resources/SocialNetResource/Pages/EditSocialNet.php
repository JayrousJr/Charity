<?php

namespace App\Filament\Resources\SocialNetResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SocialNetResource;

class EditSocialNet extends EditRecord
{
    protected static string $resource = SocialNetResource::class;

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
            ->title('Social Media')
            ->icon('heroicon-o-pencil-square')
            ->iconColor('success')
            ->body('Social Media details has been changed')
            ->send();
    }
}
