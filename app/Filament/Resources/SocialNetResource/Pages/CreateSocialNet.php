<?php

namespace App\Filament\Resources\SocialNetResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\SocialNetResource;

class CreateSocialNet extends CreateRecord
{
    protected static string $resource = SocialNetResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('New Social Link')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Social Media has been created Successifully');
    }
}
