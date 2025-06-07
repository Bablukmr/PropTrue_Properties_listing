<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs (for users or front-end).
     */
  public function index()
{
    $paginatedBlogs = Blog::latest()->paginate(6); // Pagination for 6 blogs per page
    return view('blog.index', compact('paginatedBlogs'));
}
    public function details($id)
    {
        $blog = Blog::findOrFail($id);
        // dd($blog);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        return view('blog.create');
    }
    public function toggleHomeView($id)
    {
        // dd($id);
        $blog = Blog::findOrFail($id);
        $blog->show_on_home = !$blog->show_on_home; // Toggle the home_view status
        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog home view status updated successfully.');
    }


    /**
     * Store a newly created blog post.
     */
public function store(Request $request)
{
    // dd($request->all());
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'date' => 'required|date',
        'short_description' => 'nullable|string|max:500',
        'hashtags' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
        'show_on_home' => 'boolean',
    ]);

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'_'.$image->getClientOriginalName();

        // Create blog directory if it doesn't exist
        $path = public_path('blog');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Move image to public/blog directory
        $image->move($path, $imageName);
        $imagePath = 'blog/'.$imageName;
    }

    Blog::create([
        'title' => $request->title,
        'short_description' => $request->short_description,
        'content' => $request->content,
       'show_on_home' => $request->show_on_home,
        'date' => $request->date,
        'image' => $imagePath,
        'hashtags' => $request->hashtags,
    ]);

    return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
}

    /**
     * Display blogs in admin panel.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    /**
     * Admin blog list view.
     */
    public function admin()
    {
        $title = 'Blog List';
        $blogs = Blog::latest()->get();

        return view('blog.admin', compact('title', 'blogs'));
    }
    public function indexhome()
    {
        $title = 'Blog List';
        $blogs = Blog::latest()->where('show_on_home',true)->get();

        return view('blog.admin', compact('title', 'blogs'));
    }

    /**
     * Show form to edit a blog.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update a blog post.
     */
 public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
            'date' => 'required|date',
            'hashtags' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
            'show_on_home' => 'boolean',
        ]);

        $blog = Blog::findOrFail($id);
        $data = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'date' => $request->date,
            'hashtags' => $request->hashtags,
            'show_on_home' => $request->show_on_home ?? false,
        ];

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $path = public_path('blog');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $image->move($path, $imageName);
            $data['image'] = 'blog/'.$imageName;

            // Delete old image if it exists
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Delete a blog post.
     */
       public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete associated image if it exists
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }

}
