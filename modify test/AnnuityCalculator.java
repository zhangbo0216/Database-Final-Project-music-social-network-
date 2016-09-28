package edu.nyu.cs9053.homework2;

import java.math.BigDecimal;
import java.math.RoundingMode;

/**
 * User: blangel
 * Date: 9/5/15
 * Time: 10:24 AM
 *
 * Hint, to compute the future value of an annuity
 * FVa = P * [ (((1 + r)^t) - 1) / r ]
 *  where P is the payment amount
 *  where r is the interest rate
 *  and where t is the time in years (e.g., 6 months t=0.5)
 *
 * Hint, to compute the future value of an annuity with compounding
 * FVac = P * [ (((1 + (r / m))^(m * t)) - 1) / (r / m) ]
 *  where P is the payment amount
 *  where r is the interest rate
 *  where m is the number of compounding periods in a year (e.g., annually m=1, semiannually m=2, quarterly m=4, monthly m=12)
 *  and where t is the time in years (e.g., 6 months t=0.5)
 */
public class AnnuityCalculator {

    /**
     * Use this scale when doing BigDecimal division.
     */
    private static final int DEFAULT_SCALE = 10;

    /**
     * Use this rounding mode when doing BigDecimal division.
     */
    private static final RoundingMode DEFAULT_ROUNDING_MODE = RoundingMode.HALF_UP;

    static final int COMPOUNDING_PERIOD = 12;


    public BigDecimal computeFutureValueOfAnnuityIn15Years(double annuityAmount, double annualInterestRateInPercent) {
        return computeFutureValueOfAnnuity(annuityAmount, annualInterestRateInPercent, 15);
    }

    public BigDecimal computeFutureValueOfAnnuityIn30Years(double annuityAmount, double annualInterestRateInPercent) {
        return computeFutureValueOfAnnuity(annuityAmount, annualInterestRateInPercent, 30);
    }

    public BigDecimal computeMonthlyCompoundedFutureValueOfAnnuityIn15Years(double annuityAmount, double annualInterestRateInPercent) {
        return computeMonthlyCompoundedFutureValueOfAnnuity(annuityAmount, annualInterestRateInPercent, 15);
    }

    public BigDecimal computeMonthlyCompoundedFutureValueOfAnnuityIn30Years(double annuityAmount, double annualInterestRateInPercent) {
        return computeMonthlyCompoundedFutureValueOfAnnuity(annuityAmount, annualInterestRateInPercent, 30);
    }

    public BigDecimal computeFutureValueOfAnnuity(double annuityAmount, double annualInterestRateInPercent, int years) {
        BigDecimal bigAnnuityAmount = new BigDecimal(Double.valueOf(annuityAmount));
        BigDecimal bigAnnualInterestRateInPercent = new BigDecimal(Double.valueOf(annualInterestRateInPercent));
        BigDecimal bigAnnualInterestRateInDecimal = bigAnnualInterestRateInPercent.divide(new BigDecimal(100), DEFAULT_SCALE, DEFAULT_ROUNDING_MODE);
        BigDecimal futureAnnuity = bigAnnualInterestRateInDecimal.add(new BigDecimal(1));
        futureAnnuity = futureAnnuity.pow(years).subtract(new BigDecimal(1)).divide(bigAnnualInterestRateInDecimal, DEFAULT_SCALE, DEFAULT_ROUNDING_MODE).multiply(bigAnnuityAmount);
        /*futureAnnuity = futureAnnuity.pow(years);
        futureAnnuity = futureAnnuity.subtract(new BigDecimal(1));
        futureAnnuity = futureAnnuity.divide(bigAnnualInterestRateInDecimal, DEFAULT_SCALE, DEFAULT_ROUNDING_MODE);
        futureAnnuity = futureAnnuity.multiply(bigAnnuityAmount);*/
        return futureAnnuity;
    }

    public BigDecimal computeMonthlyCompoundedFutureValueOfAnnuity(double annuityAmount, double annualInterestRateInPercent, int years) {
        BigDecimal bigAnnuityAmount = new BigDecimal(Double.valueOf(annuityAmount));
        BigDecimal bigAnnualInterestRateInPercent = new BigDecimal(Double.valueOf(annualInterestRateInPercent));
        BigDecimal bigAnnualInterestRateInDecimal = bigAnnualInterestRateInPercent.divide(new BigDecimal(100), DEFAULT_SCALE, DEFAULT_ROUNDING_MODE);
        BigDecimal monthlyBigAnnualInterestRateInDecimal = bigAnnualInterestRateInDecimal.divide(new BigDecimal(12), DEFAULT_SCALE,DEFAULT_ROUNDING_MODE);
        BigDecimal futureAnnuity = monthlyBigAnnualInterestRateInDecimal.add(new BigDecimal(1));
        futureAnnuity = futureAnnuity.pow(years * COMPOUNDING_PERIOD).subtract(new BigDecimal(1)).divide(monthlyBigAnnualInterestRateInDecimal, DEFAULT_SCALE, DEFAULT_ROUNDING_MODE).multiply(bigAnnuityAmount);
       /* futureAnnuity = futureAnnuity.pow(years * COMPOUNDING_PERIOD);
        futureAnnuity = futureAnnuity.subtract(new BigDecimal(1));
        futureAnnuity = futureAnnuity.divide(monthlyBigAnnualInterestRateInDecimal, DEFAULT_SCALE, DEFAULT_ROUNDING_MODE);
        futureAnnuity = futureAnnuity.multiply(bigAnnuityAmount);*/
        return futureAnnuity;
    }

}
