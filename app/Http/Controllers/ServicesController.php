<?php
// app/Models/Service.php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Services extends Model
    {
        protected $service = ['title', 'description', 'price'];
    }
