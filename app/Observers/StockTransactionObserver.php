<?php

namespace App\Observers;

use App\Models\TransaksiStock;

class StockTransactionObserver
{
    /**
     * Handle the StockTransaction "created" event.
     */
    public function created(TransaksiStock $stockTransaction): void
    {
        // Kode yang dijalankan saat StockTransaction dibuat
        // Contoh: Update stok barang, log aktivitas, dll.
    }

    /**
     * Handle the StockTransaction "updated" event.
     */
    public function updated(TransaksiStock $stockTransaction): void
    {
        // Kode yang dijalankan saat StockTransaction diupdate
        // Contoh: Update stok barang, log perubahan, dll.
    }

    /**
     * Handle the StockTransaction "deleted" event.
     */
    public function deleted(TransaksiStock $stockTransaction): void
    {
        // Kode yang dijalankan saat StockTransaction dihapus
        // Contoh: Restore stok barang, log penghapusan, dll.
    }

    /**
     * Handle the StockTransaction "restored" event.
     */
    public function restored(TransaksiStock $stockTransaction): void
    {
        // Kode yang dijalankan saat StockTransaction di-restore
    }

    /**
     * Handle the StockTransaction "force deleted" event.
     */
    public function forceDeleted(TransaksiStock $stockTransaction): void
    {
        // Kode yang dijalankan saat StockTransaction dihapus permanen
    }
} 