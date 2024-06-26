## Roadmap

- [x] Index page
  - [x] Create twig template `app_header` (links to login / logout / admin)
- [x] User edition in admin
- [x] Entity ManyToMany relation: bind `LinksFolder` to `Links`
- [x] Entity ManyToMany relation: bind `Admin` to `LinksFolder`
- [x] API route [GET] /api/user/{user_id}/links_folders
  - [x] User restriction owner
  - [x] User restriction admin
- [x] More data
  - [x] Update Link entity: `searchUrl`, `trigger`
  - [x] Update LinksFolder entity: `icon`, `color`
  - [x] Update admin forms

#### Dashboard display

- [ ] Use React to view user dashboards
https://symfony.com/bundles/ux-react/current/index.html

#### Edit links

- [ ] Use a service to grant access to API controller
- [ ] API route [GET] /link
  - [ ] Implement frontend interface
- [ ] API route [POST] /link
  - [ ] Implement frontend interface
- [ ] API route [DELETE] /link/{id}
  - [ ] Implement frontend interface
- [ ] API route [PATCH] /link/{id}
  - [ ] Implement frontend interface

#### Optimizations

- [ ] Move serialization logic to entity classes
- [ ] Use serializer there
https://gist.github.com/amodpandey/4460090
https://symfony.com/doc/current/components/serializer.html


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
- [ ] Create makefile


## CLI HOW TO

- search
`query :site` -> will use searchUrl if exist or google site search
- link
`:site` or `>site` -> reach site
- transformers
`::cmanel` -> cmanel case, `::uc` -> upper case, `::lc` -> lower case, `::cc` -> camel case, `::pc` -> pascal case
- viewers
`>>json {"id": 1}` -> open monaco, `>>calc` -> open calc, color palette, URL params reader
