<?php

namespace App\Filament\Auth;


use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Filament\Pages\Auth\Login as BaseAuth;
use Illuminate\Validation\ValidationException;

class LoginEx extends BaseAuth
{
    protected static string $view = 'vendor.filament.pages.auth.login';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // $this->getEmailFormComponent(), 
                $this->getLoginFormComponent(), 
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }
 
    protected function getLoginFormComponent(): Component 
    {
        return TextInput::make('login')
            ->label('Username / Email')
            ->placeholder('Username / Email')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    } 

    protected function getPasswordFormComponent(): Component 
    {
        return TextInput::make('password')
            ->label('Password')
            ->placeholder('Password')
            ->password()
            ->required()
            ->revealable()
            ->autocomplete()
            ->extraInputAttributes(['tabindex' => 2]);
    } 

    protected function getCredentialsFromFormData(array $data): array
    {
        $login_type = filter_var($data['login'], FILTER_VALIDATE_EMAIL ) ? 'email' : 'name';
 
        return [
            $login_type => $data['login'],
            'password'  => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.login' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }       
}