import { Routes } from '@angular/router';
import { CreateCategoryComponent } from './pages/category/create-category/create-category.component';
import { CreateStoreComponent } from './pages/store/create-store/create-store.component';
import { CreateSubcategoryComponent } from './pages/subcategory/create-subcategory/create-subcategory.component';
import { CreateSupplierComponent } from './pages/supplier/create-supplier/create-supplier.component';
import { EditCategoryComponent } from './pages/category/edit-category/edit-category.component';
import { EditStoreComponent } from './pages/store/edit-store/edit-store.component';
import { EditSubcategoryComponent } from './pages/subcategory/edit-subcategory/edit-subcategory.component';
import { HomeComponent } from './pages/home/home.component';
import { LoginComponent } from './pages/login/login.component';
import { ListCategoryComponent } from './pages/category/list-category/list-category.component';
import { ListStoreComponent } from './pages/store/list-store/list-store.component';
import { ListSubcategoryComponent } from './pages/subcategory/list-subcategory/list-subcategory.component';
import { ListSupplierComponent } from './pages/supplier/list-supplier/list-supplier.component';
import { EditSupplierComponent } from './pages/supplier/edit-supplier/edit-supplier.component';
import { ListItemComponent } from './pages/item/list-item/list-item.component';
import { CreateItemComponent } from './pages/item/create-item/create-item.component';

export const routes: Routes = [
    { path: '', redirectTo: '/home', pathMatch: 'full' },
    { path: 'home', component: HomeComponent},
    { path: 'login', component: LoginComponent},

    { path: 'item', component: ListItemComponent},
    { path: 'item/create', component: CreateItemComponent},
    { path: 'item/edit/:id', component: ListItemComponent},

    { path: 'store', component: ListStoreComponent},
    { path: 'store/create', component: CreateStoreComponent},
    { path: 'store/edit/:id', component: EditStoreComponent},

    { path: 'supplier', component: ListSupplierComponent},
    { path: 'supplier/create', component: CreateSupplierComponent},
    { path: 'supplier/edit/:id', component: EditSupplierComponent},

    { path: 'category', component: ListCategoryComponent},
    { path: 'category/create', component: CreateCategoryComponent},
    { path: 'category/edit/:id', component: EditCategoryComponent},

    { path: 'subcategory', component: ListSubcategoryComponent},
    { path: 'subcategory/create', component: CreateSubcategoryComponent},
    { path: 'subcategory/edit/:id', component: EditSubcategoryComponent},
];
