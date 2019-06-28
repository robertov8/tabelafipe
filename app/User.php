<?php

namespace App;

use App\Entities\History;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function histories(string $filter = '')
    {
        return $this
            ->hasMany(History::class)
            ->orderBy('created_at', 'DESC');
    }

    public function filter(string $filter = '')
    {
        if (empty($filter))
            return $this->histories();

        $filter = "%$filter%";

        return $this->histories()
            ->Where('valor', 'like', $filter)
            ->orWhere('marca', 'like', $filter)
            ->orWhere('modelo', 'like', $filter)
            ->orWhere('ano_modelo', 'like', $filter)
            ->orWhere('combustivel', 'like', $filter)
            ->orWhere('codigo_fipe', 'like', $filter)
            ->orWhere('mes_referencia', 'like', $filter)
            ->orWhere('tipo_veiculo', 'like', $filter);
    }
}
