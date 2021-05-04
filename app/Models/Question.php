<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question','quiz_id'];
    private $limit = 10;
    private $order = 'DESC';

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }

    public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }

    public function storeQuestion($data)
    {
    	$data['quiz_id'] = $data['quiz']; // Ove je zbog toga sto je u <select name='quiz'> a ne quiz_id 16:57 -> objasnjeno
    	return Question::create($data);
    }

    public function getQuestions()
    {
        return Question::orderBy('created_at',$this->order)->with('quiz')->paginate($this->limit);
    }
}
