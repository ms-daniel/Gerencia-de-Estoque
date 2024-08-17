import { Routes } from '@angular/router';
import { CreateCategoryComponent } from './pages/category/create-category/create-category.component';
import { CreateStoreComponent } from './pages/store/create-store/create-store.component';
import { CreateSubcategoryComponent } from './pages/subcategory/create-subcategory/create-subcategory.component';
import { EditCategoryComponent } from './pages/category/edit-category/edit-category.component';
import { EditStoreComponent } from './pages/store/edit-store/edit-store.component';
import { EditSubcategoryComponent } from './pages/subcategory/edit-subcategory/edit-subcategory.component';
import { HomeComponent } from './pages/home/home.component';
import { LoginComponent } from './pages/login/login.component';
import { ListCategoryComponent } from './pages/category/list-category/list-category.component';
import { ListSubcategoryComponent } from './pages/subcategory/list-subcategory/list-subcategory.component';
import { ListStoreComponent } from './pages/store/list-store/list-store.component';

export const routes: Routes = [
    { path: '', redirectTo: '/home', pathMatch: 'full' },
    { path: 'home', component: HomeComponent},
    { path: 'login', component: LoginComponent},

    { path: 'store', component: ListStoreComponent},
    { path: 'store/create', component: CreateStoreComponent},
    { path: 'store/edit/:id', component: EditStoreComponent},

    { path: 'category', component: ListCategoryComponent},
    { path: 'category/create', component: CreateCategoryComponent},
    { path: 'category/edit/:id', component: EditCategoryComponent},

    { path: 'subcategory', component: ListSubcategoryComponent},
    { path: 'subcategory/create', component: CreateSubcategoryComponent},
    { path: 'subcategory/edit/:id', component: EditSubcategoryComponent},
];
