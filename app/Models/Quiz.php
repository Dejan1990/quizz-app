<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [ 'name','description','minutes' ];

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }

    public function users()
    {
        //return $this->belongsToMany(User::class,'quiz_user');
        return $this->belongsToMany(User::class,'quiz_user');
    }

    public function storeQuiz($data)
    {
    	return Quiz::create($data);
    }

    public function allQuiz()
    {
    	return Quiz::all();
    }

    public function editQuiz($id)
    {
        return Quiz::find($id);
    }

    public function updateQuiz($id,$data)
    {
        return Quiz::find($id)->update($data);
    }

    public function deleteQuiz($id)
    {
        return Quiz::find($id)->delete();
    }
}
