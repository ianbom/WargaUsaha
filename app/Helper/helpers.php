<?php

namespace App\Helper;

use Carbon\Carbon;

class helpers
{
    /**
     * Format tanggal dan waktu dalam format Indonesia
     *
     * @param string|Carbon $date
     * @param string $format - 'full', 'medium', 'short', 'custom'
     * @return string
     */
    public static function formatDateTime($date, $format = 'full')
    {
        if (!$date) return '-';

        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);

        // Set locale ke Indonesia
        $carbon->locale('id');

        switch ($format) {
            case 'full':
                // Senin, 8 Juni 2025 14:30:45
                return $carbon->translatedFormat('l, j F Y H:i:s');

            case 'medium':
                // 8 Jun 2025, 14:30
                return $carbon->translatedFormat('j M Y, H:i');

            case 'short':
                // 08/06/25 14:30
                return $carbon->format('d/m/y H:i');

            case 'relative':
                // 2 jam yang lalu, 3 hari yang lalu
                return $carbon->diffForHumans();

            case 'time_only':
                // 14:30:45
                return $carbon->format('H:i:s');

            default:
                return $carbon->translatedFormat($format);
        }
    }

    /**
     * Format tanggal saja tanpa waktu
     *
     * @param string|Carbon $date
     * @param string $format - 'full', 'medium', 'short', 'custom'
     * @return string
     */
    public static function formatDate($date, $format = 'full')
    {
        if (!$date) return '-';

        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);

        // Set locale ke Indonesia
        $carbon->locale('id');

        switch ($format) {
            case 'full':
                // Senin, 8 Juni 2025
                return $carbon->translatedFormat('l, j F Y');

            case 'medium':
                // 8 Juni 2025
                return $carbon->translatedFormat('j F Y');

            case 'short':
                // 08/06/2025
                return $carbon->format('d/m/Y');

            case 'iso':
                // 2025-06-08
                return $carbon->format('Y-m-d');

            case 'month_year':
                // Juni 2025
                return $carbon->translatedFormat('F Y');

            case 'day_date':
                // Sen, 8 Jun
                return $carbon->translatedFormat('D, j M');

            default:
                return $carbon->translatedFormat($format);
        }
    }

    /**
     * Format rupiah Indonesia
     *
     * @param int|float $amount
     * @param bool $showSymbol - tampilkan symbol Rp atau tidak
     * @param bool $showDecimal - tampilkan desimal atau tidak
     * @return string
     */
    public static function formatRupiah($amount, $showSymbol = true, $showDecimal = false)
    {
        if ($amount === null || $amount === '') return $showSymbol ? 'Rp 0' : '0';

        $amount = (float) $amount;

        if ($showDecimal) {
            $formatted = number_format($amount, 2, ',', '.');
        } else {
            $formatted = number_format($amount, 0, ',', '.');
        }

        return $showSymbol ? 'Rp ' . $formatted : $formatted;
    }

    /**
     * Format rupiah dengan satuan (K, M, B)
     *
     * @param int|float $amount
     * @param bool $showSymbol
     * @return string
     */
    public static function formatRupiahShort($amount, $showSymbol = true)
    {
        if ($amount === null || $amount === '') return $showSymbol ? 'Rp 0' : '0';

        $amount = (float) $amount;
        $prefix = $showSymbol ? 'Rp ' : '';

        if ($amount >= 1000000000) {
            // Miliar
            return $prefix . number_format($amount / 1000000000, 1, ',', '.') . 'B';
        } elseif ($amount >= 1000000) {
            // Juta
            return $prefix . number_format($amount / 1000000, 1, ',', '.') . 'M';
        } elseif ($amount >= 1000) {
            // Ribu
            return $prefix . number_format($amount / 1000, 1, ',', '.') . 'K';
        }

        return $prefix . number_format($amount, 0, ',', '.');
    }

    /**
     * Parse rupiah string ke number
     *
     * @param string $rupiah
     * @return float
     */
    public static function parseRupiah($rupiah)
    {
        if (!$rupiah) return 0;

        // Remove Rp, spaces, and dots
        $cleaned = str_replace(['Rp', ' ', '.'], '', $rupiah);

        // Replace comma with dot for decimal
        $cleaned = str_replace(',', '.', $cleaned);

        return (float) $cleaned;
    }

    /**
     * Format waktu relatif dengan lebih detail
     *
     * @param string|Carbon $date
     * @return string
     */
    public static function timeAgo($date)
    {
        if (!$date) return '-';

        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);
        $carbon->locale('id');

        $now = now();
        $diff = $now->diffInSeconds($carbon);

        if ($diff < 60) {
            return 'Baru saja';
        } elseif ($diff < 3600) {
            $minutes = floor($diff / 60);
            return $minutes . ' menit yang lalu';
        } elseif ($diff < 86400) {
            $hours = floor($diff / 3600);
            return $hours . ' jam yang lalu';
        } elseif ($diff < 604800) {
            $days = floor($diff / 86400);
            return $days . ' hari yang lalu';
        } else {
            return $carbon->translatedFormat('j M Y');
        }
    }

    /**
     * Cek apakah tanggal adalah hari ini
     *
     * @param string|Carbon $date
     * @return bool
     */
    public static function isToday($date)
    {
        if (!$date) return false;

        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);
        return $carbon->isToday();
    }

    /**
     * Cek apakah tanggal adalah kemarin
     *
     * @param string|Carbon $date
     * @return bool
     */
    public static function isYesterday($date)
    {
        if (!$date) return false;

        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);
        return $carbon->isYesterday();
    }

    /**
     * Format untuk display tanggal yang smart
     * Hari ini: "Hari ini, 14:30"
     * Kemarin: "Kemarin, 14:30"
     * Minggu ini: "Senin, 14:30"
     * Lainnya: "8 Jun 2025"
     *
     * @param string|Carbon $date
     * @return string
     */
    public static function smartDateTime($date)
    {
        if (!$date) return '-';
        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);
        $carbon->locale('id');
        if ($carbon->isToday()) {
            return 'Hari ini, ' . $carbon->format('H:i');
        } elseif ($carbon->isYesterday()) {
            return 'Kemarin, ' . $carbon->format('H:i');
        } elseif ($carbon->isCurrentWeek()) {
            return $carbon->translatedFormat('l, H:i');
        } else {
            return $carbon->translatedFormat('j M Y');
        }
    }
}
