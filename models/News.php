<?php

class News 
{

	// Возвращает одну новость с индетификатором id
	// @param integer $id
	public static function getNewsItemById($id)
	{
           $id = intval($id);
           
           if ($id) {
               
               $db = DB::getConnection();
                
               $result = $db->query('SELECT * from news1 WHERE id=' . $id);
               $result->setFetchMode(PDO::FETCH_ASSOC);
               
               $newsItem = $result->fetch();
               
               return $newsItem;
           }
            
	}

	// Возвращает массив новостей
	public static function getNewsList()
	{
            $db = DB::getConnection();
              
            $newsList = array();
            
            $result = $db->query('SELECT id, title, date, short_content FROM news1 ORDER BY date DESC');
   
                         
            $i = 0;
            while ($row = $result->fetch()) {
                $newsList[$i]['id'] = $row['id'];
                $newsList[$i]['title'] = $row['title'];
                $newsList[$i]['date'] = $row['date'];
                $newsList[$i]['short_content'] = $row['short_content'];
                $i++;
            }
            
            return $newsList;
	}

}