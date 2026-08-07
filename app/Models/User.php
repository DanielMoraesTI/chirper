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
     * Pequeno resumo de cada personagem, exibido no modal de escolha de avatar.
     * Mesmas chaves de AVATARS.
     *
     * @var array<string, string>
     */
    public const AVATAR_BIOS = [
        'crono' => 'O herói silencioso de Guardia. Um espadachim de cabelos ruivos que, num dia comum na Feira do Milênio, acaba arrastado para uma jornada através do tempo.',
        'marle' => 'Nadia, princesa do Reino de Guardia, foge do castelo disfarçada em busca de aventura. Destemida e gentil, luta com magia de gelo e cura os aliados feridos.',
        'lucca' => 'Gênia inventora e melhor amiga de Crono desde a infância. Foi seu próprio Teleportador que abriu a fresta no tempo. Racional, leal e corajosa, luta com armas que ela mesma constrói.',
        'frog' => 'Glenn, um cavaleiro anfíbio amaldiçoado. Outrora um jovem escudeiro inseguro, hoje empunha a lendária espada Masamune com honra, em busca de redenção e vingança.',
        'robo' => 'Um robô construído numa era futura devastada, encontrado desativado e reparado pelo grupo. Gentil e leal, questiona o que significa ter um propósito além de servir.',
        'ayla' => 'Líder da tribo Ioka na Era Pré-Histórica. Guerreira de força descomunal, enfrenta os Reptites de mãos nuas para proteger seu povo.',
        'magus' => 'Poderoso feiticeiro sombrio que já comandou um exército contra a humanidade. Move-se por uma busca pessoal de vingança que o liga ao destino do mundo.',
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
