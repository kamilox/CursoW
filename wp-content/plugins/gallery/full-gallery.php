<div class="gallery-full-container">
    <div class="parent_procedure"><strong> Face Procedures </strong>
        <ul style="margin:5px 0 0 15px">
            <?php $blepharoplasty = term_exists( 'blepharoplasty', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($blepharoplasty)){?>
                    <li><a  src="#"> Blepharoplasty</a></li>
            <?php } ?>

            <?php $facelift = term_exists( 'facelift', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($facelift)){?>
                    <li><a  src="#"> Facelift</a></li>
            <?php } ?>

            <?php $neck_lift = term_exists( 'neck-lift', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($neck_lift)){?>
                    <li><a  src="#"> Neck Lift</a></li>
            <?php } ?>

            <?php $rhinoplasty = term_exists( 'rhinoplasty', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($rhinoplasty)){?>
                    <li><a  src="#"> Rhinoplasty</a></li>   
            <?php } ?>

            <?php $otoplasty = term_exists( 'otoplasty', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($otoplasty)){?>
                    <li><a  src="#"> Otoplasty</a></li>
            <?php } ?>

            <?php $upper_eyelid_blepharoplasty = term_exists( 'upper-eyelid-blepharoplasty', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($upper_eyelid_blepharoplasty)){?>
                    <li><a  src="#"> Upper Eyelid Blepharoplasty</a></li>
            <?php } ?>
        </ul>
    </div>

    <div class="parent_procedure"><strong> Breast Procedures</strong>
        <ul style="margin:5px 0 0 15px">
            <?php $breast_asymmetry_correction = term_exists( 'breast-asymmetry-correction', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($breast_asymmetry_correction)){?>
                    <li><a src="#" > Breast Asymmetry Correction</a></li>
            <?php } ?>

            <?php $breast_augmentation = term_exists( 'breast-augmentation', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($breast_augmentation)){?>
                    <li><a src="#"> Breast Augmentation</a></li>       
            <?php } ?>

            <?php $breast_augmentation_with_lift = term_exists( 'breast-augmentation-with-lift', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($breast_augmentation_with_lift)){?>
                    <li><a src="#" > Breast Augmentation with Lift</a></li>
            <?php } ?>

            <?php $breast_lift = term_exists( 'breast-lift', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($breast_lift)){?>
                    <li><a src="#" > Breast Lift</a></li>  
            <?php } ?>

            <?php $breast_reduction = term_exists( 'breast-reduction', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($breast_reduction)){?>
                    <li><a src="#"> Breast Reduction</a></li>
                    
            <?php } ?>
        </ul>
    </div>

    <div class="parent_procedure"><strong> Body Procedures </strong>
        <ul style="margin:5px 0 0 15px">
            <?php $body_lift = term_exists( 'body-lift', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($body_lift)){?>
                    <li><a src="#" > Body Lift</a></li>
            <?php } ?>

            <?php $buttock_augmentation = term_exists( 'buttock-augmentation', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($buttock_augmentation)){?>
                    <li><a src="#" > Buttock Augmentation</a></li>
            <?php } ?>
            
            <?php $liposuction = term_exists( 'liposuction', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($liposuction)){?>
                    <li><a src="#" > Liposuction</a></li>
            <?php } ?>

            <?php $mommy_makeover = term_exists( 'mommy-makeover', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($mommy_makeover)){?>
                    <li><a src="#" > Mommy Makeover</a></li>
            <?php } ?>
            
            <?php $smartLipo = term_exists( 'smartLipo', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($smartLipo)){?>
                    <li><a src="#" > SmartLipo</a></li>
            <?php } ?>

            <?php $tummy_tuck = term_exists( 'tummy-tuck', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($tummy_tuck)){?>
                    <li><a src="#"> Tummy Tuck</a></li>
            <?php } ?>
        </ul>
    </div>

    <li class="parent_procedure"><strong> Medical Spa Procedures </strong>
        <ul style="margin:5px 0 0 15px">
            <?php $dermabrasion = term_exists( 'dermabrasion', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($dermabrasion)){?>
                    <li><a name="medical-spa-procedures[]" value="Dermabrasion"> Dermabrasion</a></li>
            <?php } ?>
        </ul>
    </a></li>
    <li class="parent_procedure"><strong> Laser Treatments </strong>
        <ul style="margin:5px 0 0 15px">
            <?php $phototherapy = term_exists( 'phototherapy', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($phototherapy)){?>
                    <li><a name="laser-treatments[]" value="Phototherapy"> Phototherapy</a></li>
            <?php } ?>
            
            <?php $vascular_and_redness_treatment = term_exists( 'vascular-and-redness-treatment', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($vascular_and_redness_treatment)){?>
                    <li><a name="laser-treatments[]" value="Vascular and Redness Treatment"> Vascular and Redness Treatment</a></li>
            <?php } ?>
            
            <?php $skin_resurfacing = term_exists( 'skin-resurfacing', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($skin_resurfacing)){?>
                    <li><a name="laser-treatments[]" value="Skin Resurfacing"> Skin Resurfacing</a></li>
            <?php } ?>
            
            <?php $fractional_resurfacing = term_exists( 'fractional-resurfacing', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($fractional_resurfacing)){?>
                    <li><a name="laser-treatments[]" value="Fractional Resurfacing"> Fractional Resurfacing</a></li>
            <?php } ?>

            <?php $laser_peel = term_exists( 'laser-peel', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($laser_peel)){?>
                    <li><a name="laser-treatments[]" value="Laser Peel"> Laser Peel</a></li>
            <?php } ?>

            <?php $skin_firming = term_exists( 'skin-firming', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($skin_firming)){?>
                    <li><a name="laser-treatments[]" value="Skin Firming"> Skin Firming</a></li>
            <?php } ?>
        </ul>
    </a></li>
    <li class="parent_procedure"><strong> Male Procedures</strong>
        <ul style="margin:5px 0 0 15px">
            <?php $male_breast_reduction = term_exists( 'male-breast-reduction', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($male_breast_reduction)){?>
                    <li><a name="male-procedures[]" value="Male Breast Reduction"> Male Breast Reduction</a></li>
            <?php } ?>
            
            <?php $male_blepharoplasty = term_exists( 'male-blepharoplasty', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($male_blepharoplasty)){?>
                    <li><a name="male-procedures[]" value="Male Blepharoplasty"> Male Blepharoplasty</a></li>
            <?php } ?>
            
            <?php $male_liposuction = term_exists( 'male-liposuction', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($male_liposuction)){?>
                    <li><a name="male-procedures[]" value="Male Liposuction"> Male Liposuction</a></li>
            <?php } ?>
            
            <?php $male_neck_lift = term_exists( 'male-neck-lift', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($male_neck_lift)){?>
                    <li><a name="male-procedures[]" value="Male Neck Lift"> Male Neck Lift</a></li>
            <?php } ?>

            <?php $male_otoplasty = term_exists( 'male-otoplasty', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($male_otoplasty)){?>
                    <li><a name="male-procedures[]" value="Male Otoplasty"> Male Otoplasty</a></li>
            <?php } ?>

            <?php $male_rhinoplasty = term_exists( 'male-rhinoplasty', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($male_rhinoplasty)){?>
                    <li><a name="male-procedures[]" value="Male Rhinoplasty"> Male Rhinoplasty</a></li>
            <?php } ?>

            <?php $male_thigh_lift = term_exists( 'male-thigh-lift', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($male_thigh_lift)){?>
                    <li><a name="male-procedures[]" value="Male Thigh Lift"> Male Thigh Lift</a></li>
            <?php } ?>
                                
            <?php $injectables_for_men = term_exists( 'injectables-for-men', 'procedures' ); // array is returned if taxonomy is given 
                if(!isset($injectables_for_men)){?>
                    <li><a name="male-procedures[]" value="Injectables for Men"> Injectables for Men</a></li>
            <?php } ?>			
        </ul>
    </a></li>
</div>