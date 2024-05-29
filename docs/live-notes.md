## Roadmap

- [x] Index page
  - [x] Create twig template `app_header` (links to login / logout / admin)
- [x] User edition in admin
- [ ] Entity many2one relation: bind `LinksFolder` to `Links`
- [ ] API route [GET] user/{user_id}/links_folders
  - [ ] User restriction owner
  - [ ] User restriction admin

#### Dashboard display

- [ ] Update Links entity: `pattern`, `nick`
- [ ] Use React to view user dashboards
https://symfony.com/bundles/ux-react/current/index.html

#### Edit links

- [ ] API route [GET] /link
  - [ ] Implement frontend interface
- [ ] API route [POST] /link
  - [ ] Implement frontend interface
- [ ] API route [DELETE] /link/{id}
  - [ ] Implement frontend interface
- [ ] API route [PATCH] /link/{id}
  - [ ] Implement frontend interface

#### Link edition in front end
 
- [ ] create link
- [ ] update link
- [ ] delete link

#### Edit folders

- [ ] API route [POST] /folder
- [ ] API route [DELETE] /folder/{id}
- [ ] API route [PATCH] /folder/{id}


#### Edit dashboards

- [ ] Create entity `Dashboard`
- [ ] Entity many2one relation: bind `LinksFolder` to `Dashboard`
- [ ] API route [GET] user/{user_id}/dashboards
- [ ] API route [GET] user/{user_id}/dashboard/{dashboard_id}
- [ ] API route [POST] /dashboard
- [ ] API route [DELETE] /dashboard/{id}
- [ ] API route [PATCH] /dashboard/{id}

#### Share dashboard

- [ ] Entity many2many relation: bind `LinksFolder` to `Admin`
- [ ] Entity many2many relation: bind `Links` to `Admin`

#### Features fridge

- [ ] Profile view with restriction
- [ ] User password edition in admin
- [ ] Access errors handling
