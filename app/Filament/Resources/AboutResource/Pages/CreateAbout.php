<?php

namespace App\Filament\Resources\AboutResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\AboutResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAbout extends CreateRecord
{
    protected static string $resource = AboutResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('New About Info')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New About has been created Successifully');
    }
}
