  <?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $etudiants = Etudiant::all();
        return view('admin.etudiant.index' , compact('etudiants'));


    }
    public function create(){
        return view('admin.etudiant.create');
    }
    public function edit($id){
        $etudiant = Etudiant::find($id);
        return view('admin.etudiant.edit', compact('etudiant'));
    }
    public function store(Request $request){
        $request->validate([
            'nom'=> 'required|string',
            'prenom'=> 'required|string',
            'classe'=> 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif', // Validation for the image
        ]);

        // Generate a unique name for the image
        $avatarName = '/uploads/'. $request->nom . '.' . $request->image->getClientOriginalExtension();

        // Save the uploaded image to the public/uploads directory
        $request->image->move(public_path('uploads'), $avatarName,60);

        // Create a new student record with the image file name
        Etudiant::create([
            'nom'=> $request->nom,
            'prenom'=> $request->prenom,
            'classe'=> $request->classe,
            'image' => $avatarName,
        ]);

        return redirect()->route('etudiant.liste')->with('status', 'L\'étudiant a bien été ajouté avec succès');
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

    // public function delete_etudiant($id){
    //                  Etudiant::find($id)->delete();
    //                 return redirect()->route('etudiant.liste')->with('status','letudiant a bien ete supprime ');
    //             }

    public function update(Request $request){

        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'classe' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif', // Validation for the image
        ]);

        $etudiant =  Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;

        // Vérifier si une nouvelle image est téléchargée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image s'il existe
            if ($etudiant->image) {
                unlink(public_path($etudiant->image));
            }

            // Générer un nom unique pour la nouvelle image
            $avatarName = '/uploads/'. $request->nom . '.' . $request->image->getClientOriginalExtension();

            // Enregistrer la nouvelle image dans le dossier public/uploads
            $request->image->move(public_path('uploads'), $avatarName);

            // Mettre à jour le champ d'image de l'étudiant avec le nouveau nom de fichier
            $etudiant->image = $avatarName;
        }

        // Sauvegarder les modifications apportées à l'étudiant
        $etudiant->save();

        return redirect()->route('etudiant.liste')->with('status', 'L\'étudiant a bien été modifié avec succès');
    }
}

