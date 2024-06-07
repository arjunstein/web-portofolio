<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'visitor_os'];

    public static function monthlyVisitor($year = null)
    {
        // Jika tahun tidak diberikan, gunakan tahun saat ini
        $year = $year ?: Carbon::now()->year;

        return self::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();
    }

    public static function monthlyVisitorOs($month = null, $year = null)
    {
        // Jika bulan dan tahun tidak diberikan, gunakan bulan dan tahun saat ini
        $month = $month ?: Carbon::now()->month;
        $year = $year ?: Carbon::now()->year;

        return self::select(
            'visitor_os',
            DB::raw('COUNT(*) as count')
        )
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy('visitor_os')
            ->get();
    }
}
