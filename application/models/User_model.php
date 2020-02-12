<?php 

class User_model extends MY_Model {

	function __construct() { 
        parent::__construct();
    }

    public function get_results($search_term){
        // Use the Active Record class for safer queries.
        $this->db->distinct();
        $this->db->select('articles.*,media.TITLE_MEDIA,media.URL_MEDIA');
        $this->db->from('articles');
        $this->db->join('articles_have_category','articles.ID_ARTICLES=articles_have_category.ID_ARTICLES','left');
        $this->db->join('category','articles_have_category.ID_CATEGORY=category.ID_CATEGORY','left');
        $this->db->join('articles_have_tag','articles_have_tag.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('tag','tag.ID_TAG=articles_have_tag.ID_TAG','left');
        $this->db->join('articles_have_media','articles_have_media.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('media','media.ID_MEDIA=articles_have_media.ID_MEDIA','left');
        $this->db->join('admin_create_articles','admin_create_articles.ID_ARTICLE=articles.ID_ARTICLES','left');
        $this->db->join('admin_users','admin_users.id=admin_create_articles.id','left');
        $this->db->or_like(array('TAG_NAME'=>$search_term,'BODY_ARTICLES'=>$search_term));
        $this->db->or_like(array('category.NAME_CATEGORY'=>$search_term));
        $this->db->or_like(array('TITLE_ARTICLES'=>$search_term,'SUMMARY_ARTICLES'=>$search_term,'BODY_ARTICLES'=>$search_term));
        $this->db->order_by('CREATED_DATE',' DESC');

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->num_rows();
    }

    public function give_results($number,$offset,$search_term){
        $this->db->distinct();
        $this->db->select('articles.*,media.TITLE_MEDIA,media.URL_MEDIA');
        $this->db->join('articles_have_category','articles.ID_ARTICLES=articles_have_category.ID_ARTICLES','left');
        $this->db->join('category','articles_have_category.ID_CATEGORY=category.ID_CATEGORY','left');
        $this->db->join('articles_have_tag','articles_have_tag.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('tag','tag.ID_TAG=articles_have_tag.ID_TAG','left');
        $this->db->join('articles_have_media','articles_have_media.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('media','media.ID_MEDIA=articles_have_media.ID_MEDIA','left');
        $this->db->join('admin_create_articles','admin_create_articles.ID_ARTICLE=articles.ID_ARTICLES','left');
        $this->db->join('admin_users','admin_users.id=admin_create_articles.id','left');
        $this->db->where(array('TAG_NAME'=>$search_term));
        $this->db->or_like(array('category.NAME_CATEGORY'=>$search_term));
        $this->db->or_like(array('TITLE_ARTICLES'=>$search_term,'SUMMARY_ARTICLES'=>$search_term,'BODY_ARTICLES'=>$search_term));
        $this->db->order_by('CREATED_DATE',' DESC');

        // Execute the query.
        $query = $this->db->get('articles',$number,$offset);

        // Return the results.
        return $query->result();      
    }

    public function get_category_side($category_term){

        $query = $this->db->query(
            "
            SELECT DISTINCT articles.*,media.URL_MEDIA,media.TITLE_MEDIA FROM articles
            LEFT JOIN articles_have_category ON articles.ID_ARTICLES=articles_have_category.ID_ARTICLES
            LEFT JOIN category ON articles_have_category.ID_CATEGORY=category.ID_CATEGORY
            LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
            LEFT JOIN tag ON articles_have_tag.ID_TAG=tag.ID_TAG
            LEFT JOIN articles_have_media ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
            LEFT JOIN media ON articles_have_media.ID_MEDIA=media.ID_MEDIA
            LEFT JOIN admin_create_articles ON articles.ID_ARTICLES=admin_create_articles.ID_ARTICLE
            LEFT JOIN admin_users ON admin_create_articles.ID=admin_users.id
            WHERE category.SLUG_CATEGORY='".$category_term."'
            LIMIT 4
            "
        );

        return $query->result_array();
    }

    public function show_headline(){
        $this->db->distinct();
        $this->db->select('articles.*, media.URL_MEDIA');
        $this->db->from('articles');
        $this->db->join('articles_have_category', 'articles_have_category.ID_ARTICLES = articles.ID_ARTICLES', 'left');
        $this->db->join('category','articles_have_category.ID_CATEGORY=category.ID_CATEGORY','left');
        $this->db->join('articles_have_media','articles_have_media.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('media','media.ID_MEDIA=articles_have_media.ID_MEDIA','left');
        $this->db->where('IS_HEADLINE', 1);
        $this->db->order_by('CREATED_DATE', 'DESC');
        $this->db->limit('5');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function show_article(){
        $this->db->distinct();
        $this->db->select('articles.*,media.URL_MEDIA,media.TITLE_MEDIA');
        $this->db->from('articles');
        $this->db->join('articles_have_category', 'articles_have_category.ID_ARTICLES = articles.ID_ARTICLES', 'left');
        $this->db->join('category','articles_have_category.ID_CATEGORY=category.ID_CATEGORY','left');
        $this->db->join('articles_have_media','articles_have_media.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('media','media.ID_MEDIA=articles_have_media.ID_MEDIA','left');
        $this->db->order_by('CREATED_DATE', 'DESC');
        $this->db->limit('5');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function berita_terkini_landing(){
        $this->db->distinct();
        $this->db->select('articles.*,media.URL_MEDIA,media.TITLE_MEDIA');
        $this->db->from('articles');
        $this->db->join('articles_have_category', 'articles_have_category.ID_ARTICLES = articles.ID_ARTICLES', 'left');
        $this->db->join('category','articles_have_category.ID_CATEGORY=category.ID_CATEGORY','left');
        $this->db->join('articles_have_media','articles_have_media.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('media','media.ID_MEDIA=articles_have_media.ID_MEDIA','left');
        $this->db->order_by('CREATED_DATE', 'DESC');
        $this->db->limit('3');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function show_article_category(){
        $this->db->select('articles.*,media.URL_MEDIA');
        $this->db->from('articles');
        $this->db->join('articles_have_category', 'articles_have_category.ID_ARTICLES = articles.ID_ARTICLES', 'left');
        $this->db->join('category','articles_have_category.ID_CATEGORY=category.ID_CATEGORY','left');
        $this->db->join('articles_have_media','articles_have_media.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('media','media.ID_MEDIA=articles_have_media.ID_MEDIA','left');
        $this->db->where('category.SLUG_CATEGORY', 'nasional');
        $this->db->limit('5');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function select_article($landing_term){
        $query = $this->db->query("
                SELECT distinct articles.*,media.TITLE_MEDIA,media.URL_MEDIA,admin_users.username FROM articles
                LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
                LEFT JOIN tag ON articles_have_tag.ID_TAG=tag.ID_TAG
                LEFT JOIN articles_have_media ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
                LEFT JOIN media ON articles_have_media.ID_MEDIA=media.ID_MEDIA
                LEFT JOIN admin_create_articles ON articles.ID_ARTICLES=admin_create_articles.ID_ARTICLE
                LEFT JOIN admin_users ON admin_create_articles.ID=admin_users.id
                WHERE articles.ID_ARTICLES='".$landing_term."'
            ");

        return $query->result_array();
    }

    public function data($number,$offset){
        $this->db->distinct();
        $this->db->select('articles.*, media.TITLE_MEDIA, media.URL_MEDIA');
        $this->db->join('articles_have_category','articles_have_category.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('category','articles_have_category.ID_CATEGORY=category.ID_CATEGORY','left');
        $this->db->join('articles_have_media','articles_have_media.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('media','media.ID_MEDIA=articles_have_media.ID_MEDIA','left');
        return $query = $this->db->get('articles',$number,$offset)->result();       
    }

    public function jumlah_data(){
        return $this->db->get('articles')->num_rows();
    }

    public function sum_category($category_term){

        $query = $this->db->query(
            "
            SELECT DISTINCT articles.*,media.URL_MEDIA FROM articles
            LEFT JOIN articles_have_category ON articles.ID_ARTICLES=articles_have_category.ID_ARTICLES
            LEFT JOIN category ON articles_have_category.ID_CATEGORY=category.ID_CATEGORY
            LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
            LEFT JOIN tag ON articles_have_tag.ID_TAG=tag.ID_TAG
            LEFT JOIN articles_have_media ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
            LEFT JOIN media ON articles_have_media.ID_MEDIA=media.ID_MEDIA
            LEFT JOIN admin_create_articles ON articles.ID_ARTICLES=admin_create_articles.ID_ARTICLE
            LEFT JOIN admin_users ON admin_create_articles.ID=admin_users.id
            WHERE category.SLUG_CATEGORY='".$category_term."'
            ORDER BY articles.CREATED_DATE DESC
            "
        );

        return $query->num_rows();
    }

    public function results_sum_category($number,$offset,$category_term){
        $this->db->distinct();
        $this->db->select('articles.*,media.TITLE_MEDIA,media.URL_MEDIA');
        $this->db->join('articles_have_category','articles_have_category.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('category','category.ID_CATEGORY=articles_have_category.ID_CATEGORY','left');
        $this->db->join('articles_have_tag','articles_have_tag.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('tag','tag.ID_TAG=articles_have_tag.ID_TAG','left');
        $this->db->join('articles_have_media','articles_have_media.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('media','media.ID_MEDIA=articles_have_media.ID_MEDIA','left');
        $this->db->join('admin_create_articles','admin_create_articles.ID_ARTICLE=articles.ID_ARTICLES','left');
        $this->db->join('admin_users','admin_users.id=admin_create_articles.id','left');
        $this->db->where('category.SLUG_CATEGORY=',$category_term);
        $this->db->order_by('CREATED_DATE',' DESC');

        // Execute the query.
        $query = $this->db->get('articles',$number,$offset);

        // Return the results.
        return $query->result();
    }

    public function sum_tag($tag_term){

        $query = $this->db->query(
            "
            SELECT DISTINCT articles.*,media.URL_MEDIA FROM articles
            LEFT JOIN articles_have_category ON articles.ID_ARTICLES=articles_have_category.ID_ARTICLES
            LEFT JOIN category ON articles_have_category.ID_CATEGORY=category.ID_CATEGORY
            LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
            LEFT JOIN tag ON articles_have_tag.ID_TAG=tag.ID_TAG
            LEFT JOIN articles_have_media ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
            LEFT JOIN media ON articles_have_media.ID_MEDIA=media.ID_MEDIA
            LEFT JOIN admin_create_articles ON articles.ID_ARTICLES=admin_create_articles.ID_ARTICLE
            LEFT JOIN admin_users ON admin_create_articles.ID=admin_users.id
            WHERE tag.SLUG='".$tag_term."'
            ORDER BY articles.CREATED_DATE DESC
            "
        );

        return $query->num_rows();
    }

    public function results_sum_tag($number,$offset,$tag_term){
        $this->db->distinct();
        $this->db->select('articles.*,media.TITLE_MEDIA,media.URL_MEDIA');
        $this->db->join('articles_have_category','articles_have_category.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('category','category.ID_CATEGORY=articles_have_category.ID_CATEGORY','left');
        $this->db->join('articles_have_tag','articles_have_tag.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('tag','tag.ID_TAG=articles_have_tag.ID_TAG','left');
        $this->db->join('articles_have_media','articles_have_media.ID_ARTICLES=articles.ID_ARTICLES','left');
        $this->db->join('media','media.ID_MEDIA=articles_have_media.ID_MEDIA','left');
        $this->db->join('admin_create_articles','admin_create_articles.ID_ARTICLE=articles.ID_ARTICLES','left');
        $this->db->join('admin_users','admin_users.id=admin_create_articles.id','left');
        $this->db->where('tag.SLUG=',$tag_term);
        $this->db->order_by('CREATED_DATE',' DESC');

        // Execute the query.
        $query = $this->db->get('articles',$number,$offset);

        // Return the results.
        return $query->result();
    }

    public function get_tag_side($tag_term){

        $query = $this->db->query(
            "
            SELECT DISTINCT articles.*,media.URL_MEDIA,media.TITLE_MEDIA FROM articles
            LEFT JOIN articles_have_category ON articles.ID_ARTICLES=articles_have_category.ID_ARTICLES
            LEFT JOIN category ON articles_have_category.ID_CATEGORY=category.ID_CATEGORY
            LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
            LEFT JOIN tag ON articles_have_tag.ID_TAG=tag.ID_TAG
            LEFT JOIN articles_have_media ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
            LEFT JOIN media ON articles_have_media.ID_MEDIA=media.ID_MEDIA
            LEFT JOIN admin_create_articles ON articles.ID_ARTICLES=admin_create_articles.ID_ARTICLE
            LEFT JOIN admin_users ON admin_create_articles.ID=admin_users.id
            WHERE tag.SLUG='".$tag_term."'
            LIMIT 4
            "
        );

        return $query->result_array();
    }
}