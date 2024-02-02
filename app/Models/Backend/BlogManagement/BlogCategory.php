<?php

namespace App\Models\Backend\BlogManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'image', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'blog_categories';

    protected static $blogCategory;

    public static function createOrUpdateBlogCategory($request, $id = null)
    {
        if (isset($id))
        {
            self::$blogCategory = BlogCategory::find($id);
        } else {
            self::$blogCategory = new BlogCategory();
        }

        self::$blogCategory->name               = $request->name;
        self::$blogCategory->image              = fileUpload($request->file('image'), 'blog-management/blog-categories', isset($id) ? static::find($id)->image : '');
        self::$blogCategory->status             = $request->status == 'on' ? 1 : 0;
        self::$blogCategory->save();
    }

    public static function deleteBlogCategory($id)
    {
        self::$blogCategory = BlogCategory::find($id);
        if (file_exists(self::$blogCategory->image))
        {
            unlink(self::$blogCategory->image);
        }
        self::$blogCategory->delete();
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
