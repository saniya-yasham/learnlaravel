# Models (day18 of backend course)

-   Introduce one-to-one example: User ↔ Phone
-   Define in User model:  
    public function phone() { return $this->hasOne(Phone::class); }
-   Define in Phone model:  
    public function user() { return $this->belongsTo(User::class); }

-   Revise Model topic: $fillable and $table in models

-   Show them JOIN queries using SQL
-   Explain Eloquent relationships link models without manual joins
-   Show usage in tinker or controller: $user->phone->number and $phone->user->name
-   Explain eager loading: User::with('phone')->get() to avoid N+1 queries
-   Emphasize why relationships simplify data fetching and keep code clean
