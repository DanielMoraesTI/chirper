<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'email', 'password', 'avatar'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Personagens de Chrono Trigger disponíveis para identificar o usuário.
     * Chave = valor salvo no banco, valor = nome de exibição.
     *
     * @var array<string, string>
     */
    public const AVATARS = [
        'crono' => 'Crono',
        'marle' => 'Marle',
        'lucca' => 'Lucca',
        'frog' => 'Frog',
        'robo' => 'Robo',
        'ayla' => 'Ayla',
        'magus' => 'Magus',
    ];

    /**
     * Caminho público da imagem do avatar do usuário.
     */
    public function avatarUrl(): string
    {
        $avatar = array_key_exists($this->avatar, self::AVATARS) ? $this->avatar : 'crono';

        return asset("images/chrono-trigger/avatars/{$avatar}.png");
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function chirps(): HasMany
    {
        return $this->hasMany(Chirp::class);
    }

    
}
