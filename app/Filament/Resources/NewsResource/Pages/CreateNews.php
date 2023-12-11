<?php

namespace App\Filament\Resources\NewsResource\Pages;

use Filament\Actions;
use App\Filament\Resources\NewsResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('News Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New News has been created Successifully');
    }
}