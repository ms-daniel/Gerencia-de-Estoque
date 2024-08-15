import { Component, Input } from '@angular/core';
import { Category } from '../../../_models/category';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { FormsModule } from '@angular/forms';


@Component({
  selector: 'app-create-category',
  standalone: true,
  imports: [
    RouterLink, RouterLinkActive,
    FormsModule
  ],
  templateUrl: './create-category.component.html',
  styleUrl: './create-category.component.css'
})
export class CreateCategoryComponent {
  category: Category = {id: 0, name: ''};

  seeCategoery(): void {
    console.log(this.category);
  }
}
