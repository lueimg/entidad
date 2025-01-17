<?php

namespace App\Models\BasicManage;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected   $table = 'cargos';

    public static function runEditStatus($r)
    {
        $cargo = Cargo::find($r->id);
        $cargo->estado = trim( $r->estadof );
        $cargo->persona_id_updated_at=1;
        $cargo->save();
    }

    public static function runNew($r)
    {
        $cargo = new Cargo;
        $cargo->cargo = trim( $r->cargo );
        $cargo->estado = trim( $r->estado );
        $cargo->persona_id_created_at=1;
        $cargo->save();
    }

    public static function runEdit($r)
    {
        $cargo = Cargo::find($r->id);
        $cargo->cargo = trim( $r->cargo );
        $cargo->estado = trim( $r->estado );
        $cargo->persona_id_updated_at=1;
        $cargo->save();
    }

    public static function runLoad($r)
    {
        $sql=Cargo::select('id','cargo','estado')
            ->where( 
                function($query) use ($r){
                    if( $r->has("cargo") ){
                        $cargo=trim($r->cargo);
                        if( $cargo !='' ){
                            $query->where('cargo','like','%'.$cargo.'%');
                        }
                    }
                    if( $r->has("estado") ){
                        $estado=trim($r->estado);
                        if( $estado !='' ){
                            $query->where('estado','like','%'.$estado.'%');
                        }
                    }
                }
            );
        $result['count']=$sql->count();
        $result['data']=$sql->orderBy('cargo','asc')->get();
        return $result;
    }
}
