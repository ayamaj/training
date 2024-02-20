<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index_post(){
        $posts = post::all();
        return view('admin.post.post_index' , compact('posts'));
        //// return etudiant
        $posts = Post::with('user:name')->get();

        return view('admin.posts.index', ['posts' => $posts]);


    }
    public function create_post(){
        return view('admin.post.post_create');
    }
    public function edit_post($id){
        $post = post::find($id);
        return view('admin.post.post_edit', compact('post'));
    }
    public function store_post(Request $request){
        $request->validate([
            'title'=> 'required|string',
            'content'=> 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif', // Validation for the image
        ]);

        // Generate a unique name for the image
        $avatarName = '/uploads/'. $request->nom . '.' . $request->image->getClientOriginalExtension();

        // Save the uploaded image to the public/uploads directory
        $request->image->move(public_path('uploads'), $avatarName,60);
        $user =Auth::guard('admin')->user()->id;
        // Create a new student record with the image file name
        post::create([
            'title'=> $request->title,
            'content'=> $request->content,
            'image' => $avatarName,
            'etudiant_id' => $user,

        ]);

        return redirect()->route('post.liste_post')->with('status', 'le post a bien été ajouté avec succès');
    }


    // public function update_etudiant_traitement(Request $request){
    //             $request->validate([
    //             'nom' => 'required',
    //             'prenom' => 'required',
    //             'classe' => 'required', ]);

    //                $etudiant =  Etudiant::find($request->id);
    //                $etudiant->nom = $request->nom;
    //                $etudiant->prenom = $request->prenom;
    //                $etudiant->classe = $request->classe;
    //                $etudiant->update();
    // return redirect()->route('etudiant.liste')-> with('status', 'létudiant a bien ete modifier avec succes');}

    public function delete_post($id){
                     post::find($id)->delete();
                    return redirect()->route('post.liste_post')->with('status','le post a bien ete supprime ');
                 }

    public function update_post(Request $request){

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif', // Validation for the image
        ]);

        $post =  post::find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;


        // Vérifier si une nouvelle image est téléchargée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image s'il existe
            if ($post->image) {
                unlink(public_path($post->image));
            }

            // Générer un nom unique pour la nouvelle image
            $avatarName = '/uploads/'. $request->title . '.' . $request->image->getClientOriginalExtension();

            // Enregistrer la nouvelle image dans le dossier public/uploads
            $request->image->move(public_path('uploads'), $avatarName);

            // Mettre à jour le champ d'image de l'étudiant avec le nouveau nom de fichier
            $post->image = $avatarName;
        }

        // Sauvegarder les modifications apportées à l'étudiant
        $post->save();

        return redirect()->route('post.liste_post')->with('status', 'le post a bien été modifié avec succès');
    }
}
