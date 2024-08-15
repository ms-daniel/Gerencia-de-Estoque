import { Routes } from '@angular/router';
import { HomeComponent } from './pages/home/home.component';
import { LoginComponent } from './pages/login/login.component';
import { SubcategoryComponent } from './pages/subcategory/subcategory.component';
import { ListCategoryComponent } from './pages/category/list-category/list-category.component';
import { CreateCategoryComponent } from './pages/category/create-category/create-category.component';

export const routes: Routes = [
    { path: '', redirectTo: '/home', pathMatch: 'full' },
    { path: 'home', component: HomeComponent},
    { path: 'login', component: LoginComponent},

    { path: 'category', component: ListCategoryComponent},
    { path: 'category/create', component: CreateCategoryComponent},

    { path: 'subcategory', component: SubcategoryComponent},
];
