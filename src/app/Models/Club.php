<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Club extends Model
{
    use HasFactory;

    protected $fillable = ['nama_club', 'tahun_berdiri', 'negara'];

    protected $casts = [
        'nama_club' => 'encrypted',
        'tahun_berdiri' => 'encrypted',
        'negara' => 'encrypted',
    ];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
