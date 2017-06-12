<?php

namespace sistemaPractica;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    const PAGINATE = true;

    	public static $filters=[];
	public static function searchInmuebles(array $data=array(), $paginate = false)
    {
    	$data = array_only($data,static::$filters);
    	$data = array_filter($data,'strlen');

      
    	  //       $q = Articulo::select()->where('estado','=','Activo');

    	  $q = Inmueble::select();

    	    foreach ($data as $field => $value) {
    	    	
    	    	if(isset($data[$field]))
                   {
                   	//slug_url -> filterBySlugUrl
                   	$filterMethod = 'filterBy'.studly_case($field);

                   	if(method_exists(get_called_class(),$filterMethod))
                   	{
                   		static::$filterMethod($q,$value);
                   	}
                   	else
                   	{
                   	$q->where($field,$data[$field]);

                   	}
                   }
               }

               return $paginate ?
               $q->paginate(5)
               : $q->get();
    }


    public static function searchBarrios(array $data=array(), $paginate = false)
    {
    	$data = array_only($data,static::$filters);
    	$data = array_filter($data,'strlen');
    	  
    	  $q = Barrio::select();

    	    foreach ($data as $field => $value) {
    	    	
    	    	if(isset($data[$field]))
                   {
                   	//slug_url -> filterBySlugUrl
                   	$filterMethod = 'filterBy'.studly_case($field);

                   	if(method_exists(get_called_class(),$filterMethod))
                   	{
                   		static::$filterMethod($q,$value);
                   	}
                   	else
                   	{
                   	$q->where($field,$data[$field]);

                   	}
                   }
               }

               return $paginate ?
               $q->paginate(5)
               : $q->get();
    }

      public static function searchCiudades(array $data=array(), $paginate = false)
    {
      $data = array_only($data,static::$filters);
      $data = array_filter($data,'strlen');
        
        $q = Ciudad::select();

          foreach ($data as $field => $value) {
            
            if(isset($data[$field]))
                   {
                    //slug_url -> filterBySlugUrl
                    $filterMethod = 'filterBy'.studly_case($field);

                    if(method_exists(get_called_class(),$filterMethod))
                    {
                      static::$filterMethod($q,$value);
                    }
                    else
                    {
                    $q->where($field,$data[$field]);

                    }
                   }
               }

               return $paginate ?
               $q->paginate(5)
               : $q->get();
    }


}
