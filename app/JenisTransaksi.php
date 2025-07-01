<?php

namespace App;

enum JenisTransaksi: string
{
    case Debet = 'debet';
    case Kredit = 'kredit';
}