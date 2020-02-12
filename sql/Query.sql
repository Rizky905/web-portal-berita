SELECT * FROM articles
LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
LEFT JOIN tag ON tag.ID_TAG=articles_have_tag.ID_TAG
LEFT JOIN articles_have_media ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
LEFT JOIN media ON media.ID_MEDIA=articles_have_media.ID_MEDIA
LEFT JOIN articles_have_category ON articles.ID_ARTICLES=articles_have_category.ID_ARTICLES
LEFT JOIN category ON category.ID_CATEGORY=articles_have_category.ID_CATEGORY
LEFT JOIN parent_category ON parent_category.ID_PARENT_CATEGORY=category.ID_PARENT_CATEGORY
LEFT JOIN admin_create_articles ON admin_create_articles.ID_ARTICLES=articles.ID_ARTICLES
LEFT JOIN admin_users ON admin_users.id=admin_create_articles.id
WHERE category.NAME_CATEGORY=%a%,parent_category.NAME_PARENT_CATEGORY=%a%,tag.TAG_NAME=%a%
articles.TITLE_ARTICLES LIKE %a% OR articles.SUMMARY_ARTICLES LIKE %a%