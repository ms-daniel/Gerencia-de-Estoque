import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateSubcategoryComponent } from './create-subcategory.component';

describe('CreateSubcategoryComponent', () => {
  let component: CreateSubcategoryComponent;
  let fixture: ComponentFixture<CreateSubcategoryComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CreateSubcategoryComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(CreateSubcategoryComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
