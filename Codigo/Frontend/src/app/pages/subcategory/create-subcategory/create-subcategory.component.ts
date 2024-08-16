import { Component } from '@angular/core';
import { Subcategory } from '../../../_models/subcategory';
import { FormsModule } from '@angular/forms';
import { RouterLink, RouterLinkActive } from '@angular/router';

@Component({
  selector: 'app-create-subcategory',
  standalone: true,
  imports: [FormsModule, RouterLink, RouterLinkActive],
  templateUrl: './create-subcategory.component.html',
  styleUrl: './create-subcategory.component.css'
})
export class CreateSubcategoryComponent {
  subcategory: Subcategory = {Id: 0, Name: ''};

  seeCategoery(): void {
    console.log(this.subcategory);
  }
}
