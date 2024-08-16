import { Component, OnInit } from '@angular/core';
import { Category } from '../../../_models/category';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-edit-category',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './edit-category.component.html',
  styleUrl: './edit-category.component.css'
})
export class EditCategoryComponent implements OnInit {
  category: Category = {Id: 0, Name: ''};
  categoryId: number = 0;

  constructor(private route: ActivatedRoute) {}

  ngOnInit(): void {
    this.categoryId = Number(this.route.snapshot.paramMap.get('id')) || 0;

    console.log(this.categoryId);
  }
}
